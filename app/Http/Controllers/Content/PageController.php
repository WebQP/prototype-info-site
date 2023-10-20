<?php

namespace App\Http\Controllers\Content;

use App\Http\Controllers\Controller;
use App\Models\Base\BaseNavigation;
use App\Models\Base\Pages\BasePage;
use App\Models\Base\Pages\BasePageLocalisation;
use App\Models\Data\DataLocalisation;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $getPagesList = BasePage::orderBy('id')->get();

        foreach ($getPagesList as $item) {
            $pageData = [
                'id' => $item->id,
                'status' => $item->status,
                'slug' => $item->slug == '/' ? '/' : '/' . $item->slug,
                'name' => $item->name,
                'title' => $item->title,
                'description' => $item->description,
                'preview_image' => $item->preview_image,
                'languages' => $this->languageVersionsPage($item->id),
                'created_at' => Carbon::parse($item->created_at)->format('d.m.Y H:i:s'),
                'updated_at' => Carbon::parse($item->updated_at)->format('d.m.Y H:i:s'),

            ];

            if ($item->status_delete == 1) {
                $listPages[] = $pageData;
            } else {
                $listPagesNonDeleted[] = $pageData;
            }
        }

        return [
            'listLanguages' => $this->languagesData(),
            'listPagesNonDeleted' => $listPagesNonDeleted ?? [],
            'listPages' => $listPages ?? [],
        ];
    }

    private function languageVersionsPage(int $id)
    {
        $languageVersionsPage = BasePageLocalisation::where('page_id', $id)->get();
        $languageVersions = [];
        $languagesData =  $this->languagesData();
        $languageVersions[] = [
            'name' => $languagesData['langMain']['name'],
            'prefix' => $languagesData['langMain']['prefix'],
            'previewImage' => $languagesData['langMain']['previewImage'],
        ];
        if (count($languageVersionsPage) > 0) {
            foreach ($languageVersionsPage as $item) {
                $langData = $this->langDataID($item->localisation_id);
                $languageVersions[] = [
                    'name' => $langData['name'],
                    'prefix' => $langData['prefix'],
                    'previewImage' => $langData['previewImage'],
                ];
            }
        }
        return $languageVersions;
    }

    public function langDataID(string $langID): array
    {
        $getLocale = DataLocalisation::where('id', trim($langID))->first();
        if (isset($getLocale->id)) {
            return [
                'id' => $getLocale->id,
                'status' => $getLocale->status,
                'name' => $getLocale->name,
                'prefix' => $getLocale->prefix,
                'previewImage' => $getLocale->preview_image,
                'main' => $getLocale->main,
            ];
        }
        return [
            'id' => 0,
            'status' => 0,
            'name' => 'No Language',
            'prefix' => 'no',
            'previewImage' => '',
            'main' => 0,
        ];
    }

    public function store(Request $request)
    {
        $slug = $this->generationUrl($request->pageName);

        $postPage = new BasePage();
        $postPage->status = $request->pageStatus;
        $postPage->slug = $slug;
        $postPage->name = trim($request->pageName);
        $postPage->title = trim($request->pageTitle);
        $postPage->description = trim($request->pageDescription);
        $postPage->contents = trim($request->pageContent);
        $postPage->preview_image = trim($request->pageImagePreview);
        $postPage->save();

        $this->createNavigation($slug, $postPage->id, 1, $request->pageStatus);

        return ['id' => $postPage->id];
    }

    public function show(string $id)
    {
        //
    }

    public function edit(int $id, Request $request)
    {
        $lang = $request->lang;
        if (trim($lang) == '') {
            $page = BasePage::find($id);
        } else {
            $getLocale = DataLocalisation::where('prefix', trim($lang))->where('status', 1)->first();
            if (isset($getLocale->id)) {
                $page = BasePageLocalisation::where('page_id', $id)
                    ->where('localisation_id', $getLocale->id)
                    ->first();
                $pageMainLang = BasePage::find($id);
            }
        }

        $languages = $this->languagesData();

        return [
            'id' => $page->id ?? $pageMainLang->id,
            'status' => $page->status ?? $pageMainLang->status,
            'slug' => $page->slug ?? $pageMainLang->slug,
            'name' => $page->name ?? '',
            'nameMainLang' => $pageMainLang->name ?? '',
            'title' => $page->title ?? '',
            'description' => $page->description ?? '',
            'contents' => $page->contents ?? '',
            'previewImage' => $page->preview_image ?? '',
            'lang' => $lang == '' ? $lang : $languages['langMain']['prefix'],
            'listLanguages' => $languages,
        ];
    }


    public function update(Request $request, string $id)
    {
        $lang = $request->pageLang;
        $langData = $this->languagesData();
        if ($lang == $langData['langMain']['prefix']) {
            $postPage = BasePage::find($id);
            $postPage->status = $request->pageStatus;
            $postPage->name = trim($request->pageName);
            $postPage->title = trim($request->pageTitle);
            $postPage->description = trim($request->pageDescription);
            $postPage->contents = trim($request->pageContent);
            $postPage->preview_image = trim($request->pageImagePreview);
            $postPage->save();
        } else {
            $getLocale = DataLocalisation::where('prefix', trim($lang))
                ->where('status', 1)
                ->first();
            if (isset($getLocale->id)) {
                $postPage = BasePageLocalisation::where('page_id', $id)
                    ->where('localisation_id', $getLocale->id)
                    ->first();
                if (isset($postPage->id)) {
                    $postPage->status = $request->pageStatus;
                    $postPage->name = trim($request->pageName);
                    $postPage->title = trim($request->pageTitle);
                    $postPage->description = trim($request->pageDescription);
                    $postPage->contents = trim($request->pageContent);
                    $postPage->preview_image = trim($request->pageImagePreview);
                    $postPage->save();
                } else {
                    $postPage = new BasePageLocalisation();
                    $postPage->page_id = $id;
                    $postPage->localisation_id = $getLocale->id;
                    $postPage->status = $request->pageStatus;
                    $postPage->name = trim($request->pageName);
                    $postPage->title = trim($request->pageTitle);
                    $postPage->description = trim($request->pageDescription);
                    $postPage->contents = trim($request->pageContent);
                    $postPage->preview_image = trim($request->pageImagePreview);
                    $postPage->save();
                }
            }
        }

        return ['id' => $id];
    }


    public function destroy(string $id)
    {
        BasePage::where('id', $id)->delete();
        BasePageLocalisation::where('page_id', $id)->delete();
        BaseNavigation::where('page_id', $id)->where('page_type', 1)->delete();
    }

    public function languagesData(string $lang = ''): array
    {
        $getLocaleList = DataLocalisation::where('status', 1)->get();

        $localeMain = [];
        $langCurrent = [];
        $localeList = [];

        foreach ($getLocaleList as $item) {
            if ($item->main == 1) {
                $localeMain = [
                    'name' => $item->name,
                    'prefix' => $item->prefix,
                    'previewImage' => $item->preview_image,
                ];
                if ($lang == '') {
                    $langCurrent = [
                        'name' => $item->name,
                        'prefix' => $item->prefix,
                        'previewImage' => $item->preview_image,
                    ];
                }
            }

            if ($item->prefix == $lang) {
                $langCurrent = [
                    'name' => $item->name,
                    'prefix' => $item->prefix,
                    'previewImage' => $item->preview_image,
                ];
            }

            $localeList[] = [
                'name' => $item->name,
                'prefix' => $item->prefix,
                'previewImage' => $item->preview_image,
            ];
        }

        return [
            'langMain' => $localeMain,
            'langList' => $localeList,
            'langCurrent' => $langCurrent,
        ];
    }

    public function createNavigation(string $slug, int $pageId, int $pageType, int $pageStatus = 1): void
    {
        $post = new BaseNavigation();
        $post->status = $pageStatus;
        $post->slug = $slug;
        $post->page_id = $pageId;
        $post->page_type = $pageType;
        $post->save();
    }

    public function generationUrl(string $name): string
    {
        $converter = [
            'а' => 'a', 'б' => 'b', 'в' => 'v', 'г' => 'g', 'д' => 'd',
            'е' => 'e', 'ё' => 'e', 'ж' => 'zh', 'з' => 'z', 'и' => 'i',
            'й' => 'y', 'к' => 'k', 'л' => 'l', 'м' => 'm', 'н' => 'n',
            'о' => 'o', 'п' => 'p', 'р' => 'r', 'с' => 's', 'т' => 't',
            'у' => 'u', 'ф' => 'f', 'х' => 'h', 'ц' => 'c', 'ч' => 'ch',
            'ш' => 'sh', 'щ' => 'sch', 'ь' => '', 'ы' => 'y', 'ъ' => '',
            'э' => 'e', 'ю' => 'yu', 'я' => 'ya',
        ];

        $slug = mb_strtolower(trim($name));
        $slug = strtr($slug, $converter);
        $slug = mb_ereg_replace('[^-0-9a-z\.]', '-', $slug);
        $slug = mb_ereg_replace('[-]+', '-', $slug);
        $slug = str_replace('--', '-', $slug);
        $slug = trim($slug, '-');

        $uniqueSlug = false;
        $iteration = 1;
        $slugPage = $slug;

        while (!$uniqueSlug) {
            $getItem = BaseNavigation::where('slug', $slugPage)->first();
            if (isset($getItem->id)) {
                $iteration++;
                $slugPage = $slug . '-' . $iteration;
            } else {
                $uniqueSlug = true;
            }
        }

        return $slugPage;
    }
}
