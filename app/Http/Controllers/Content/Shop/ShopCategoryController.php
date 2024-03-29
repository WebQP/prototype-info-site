<?php

namespace App\Http\Controllers\Content\Shop;

use App\Facades\MetaContentFacade as MetaContent;
use App\Facades\MetaSeoFacade as MetaSeo;
use App\Http\Controllers\Controller;
use App\Http\Controllers\DataOtherController;
use App\Http\Controllers\MetaController;
use App\Models\Base\BaseNavigation;
use App\Models\Base\Shop\BaseShopCategory;
use App\Models\Base\Shop\BaseShopCategoryLocalisation;
use App\Models\Base\Shop\BaseShopCategoryProduct;
use App\Models\Base\Shop\BaseShopProduct;
use App\Models\Data\DataLocalisation;
use Illuminate\Http\Request;

class ShopCategoryController extends Controller
{
    public function __construct()
    {
        $this->pageType = 4; //Тип страницы в навигации
    }

    //Список для листинга
    public function index()
    {
        return [
            'listLanguages' => $this->languagesData(),
            'listPages' => $this->listCategory() ?? [],
        ];
    }

    //Получаем список категорий для связывания
    public function listCategory()
    {
        $categoriseParentsList = BaseShopCategory::where('parent_id', 0)
            ->where('status', 1)
            ->orderBy('id', 'ASC')
            ->get();
        $listCategories = [];
        $level = 0;
        foreach ($categoriseParentsList as $item) {
            $listCategories[] = [
                'id' => $item->id,
                'slug' => '/' . $item->slug,
                'name' => $item->name,
                'status_delete' => $item->status_delete,
                'level' => 0,
                'languages' => $this->languageVersionsPage($item->id),
                'children' => $this->listCategoryChildren($item->id, $level),
            ];
        }
        return $listCategories;
    }

    //Добавление записи
    public function store(Request $request)
    {
        $slug = $this->generationUrl($request->pageName);

        $postPage = new BaseShopCategory();
        $postPage->status = $request->pageStatus;
        $postPage->parent_id = trim($request->pageParent);
        $postPage->slug = $slug;
        $postPage->name = trim($request->pageName);
        $postPage->title = trim($request->pageTitle);
        $postPage->description = trim($request->pageDescription);
        $postPage->contents = trim($request->pageContent);
        $postPage->preview_image = trim($request->pageImagePreview);
        $postPage->save();

        $this->addNavigation($slug, $postPage->id, $this->pageType, $request->pageStatus);

        return ['id' => $postPage->id];
    }

    //Получаем данные записи
    public function show(int $id): object
    {

        $dataPage = BaseShopCategory::find($id);
        $pagination = BaseShopCategoryProduct::where('category_id', $id)
            ->where('status', 1)
            ->orderBy('id', 'desc')
            ->paginate(16);

        $productList = [];
        foreach ($pagination as $item) {
            $productList[] = BaseShopProduct::find($item->post_id);
        }

        $page = (object)[];
        $page->meta = MetaSeo::pageSeo($this->pageType, $dataPage);
        $page->content = MetaContent::pageContent($this->pageType, $dataPage);
        $page->pagination = $pagination;
        $page->listProducts = (new DataOtherController())->formatProductCategory($productList);

        return $page;
    }

    //Формируем хлебные крошки
    private function breadcrumbShopCategory(int $idCategory): array
    {
        $category = BaseShopCategory::find($idCategory);
        $parent = [];
        if ($category->parent_id != 0) {
            $parent = BaseShopCategory::find($category->id);
        }
        return [];
    }

    //Получаем данные для редактирования записи
    public function edit(int $id, Request $request)
    {
        $lang = $request->lang;
        if (trim($lang) == '') {
            $page = BaseShopCategory::find($id);
        } else {
            $getLocale = DataLocalisation::where('prefix', trim($lang))
                ->where('status', 1)
                ->first();
            if (isset($getLocale->id)) {
                $page = BaseShopCategoryLocalisation::where('page_id', $id)
                    ->where('localisation_id', $getLocale->id)
                    ->first();
                $pageMain = BaseShopCategory::find($id);
            }
        }

        $languages = $this->languagesData();

        return [
            'id' => $id,
            'status' => $page->status ?? $pageMain->status,
            'slug' => $page->slug ?? $pageMain->slug,
            'name' => $page->name ?? '' ?? $pageMain->name,
            'nameMainLang' => $pageMain->name ?? '',
            'title' => $page->title ?? '',
            'description' => $page->description ?? '',
            'contents' => $page->contents ?? '',
            'previewImage' => $page->preview_image ?? '',
            'lang' => $lang == '' ? $lang : $languages['langMain']['prefix'],
            'parent_id' => $page->parent_id ?? 0,
            'langList' => $languages,
            'categoriesList' => $this->listCategory(),
        ];
    }

    //Обновляем запись
    public function update(Request $request, string $id)
    {
        $lang = $request->pageLang;
        $langData = $this->languagesData();
        if ($lang == $langData['langMain']['prefix']) {
            $postPage = BaseShopCategory::find($id);
            $postPage->status = $request->pageStatus;
            $postPage->name = trim($request->pageName);
            $postPage->title = trim($request->pageTitle);
            $postPage->description = trim($request->pageDescription);
            $postPage->contents = trim($request->pageContent);
            $postPage->preview_image = trim($request->pageImagePreview);
            $postPage->parent_id = trim($request->pageParent);
            $postPage->save();
        } else {
            $getLocale = DataLocalisation::where('prefix', trim($lang))->where('status', 1)->first();
            if (isset($getLocale->id)) {
                $postPage = BaseShopCategoryLocalisation::where('page_id', $id)
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
                    $postPage = new BaseShopCategoryLocalisation();
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

    //Удаляем запись и связанные данные
    public function destroy(string $id)
    {
        BaseShopCategory::where('id', $id)->delete();
        BaseShopCategoryLocalisation::where('page_id', $id)->delete();
        BaseShopCategoryProduct::where('category_id', $id)->delete();
        BaseNavigation::where('page_id', $id)->where('page_type', $this->pageType)->delete();
    }

    //Получаем список подкатегорий родительской категории
    public function listCategoryChildren($id, $level)
    {
        $getCategoriseParents = BaseShopCategory::where('parent_id', $id)
            ->where('status', 1)
            ->orderBy('id', 'ASC')
            ->get();
        $listCategories = [];
        $level++;
        foreach ($getCategoriseParents as $item) {
            $listCategories[] = [
                'id' => $item->id,
                'slug' => '/' . $item->slug,
                'name' => $item->name,
                'status_delete' => $item->status_delete,
                'level' => $level,
                'languages' => $this->languageVersionsPage($item->id),
                'children' => $this->listCategoryChildren($item->id, $level),
            ];
        }
        return $listCategories;
    }

    //Получаем наличий локализации страницы
    private function languageVersionsPage(int $id)
    {
        $languageVersionsPage = BaseShopCategoryLocalisation::where('page_id', $id)->get();
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

    //Получаем данные языка по ID
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

    //Раскладываем языки
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

    //Добавляем запись в навигацию
    public function addNavigation(string $slug, int $pageId, int $pageType, int $pageStatus = 1): void
    {
        $post = new BaseNavigation();
        $post->status = $pageStatus;
        $post->slug = $slug;
        $post->page_id = $pageId;
        $post->page_type = $pageType;
        $post->save();
    }

    //Генерируем уникальный URL для страницы
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
