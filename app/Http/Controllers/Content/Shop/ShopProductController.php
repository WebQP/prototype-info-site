<?php

namespace App\Http\Controllers\Content\Shop;

use App\Http\Controllers\Controller;
use App\Http\Controllers\DataOtherController;
use App\Http\Controllers\MetaController;
use App\Models\Base\BaseNavigation;
use App\Models\Base\Shop\BaseShopCategoryProduct;
use App\Models\Base\Shop\BaseShopProduct;
use App\Models\Base\Shop\BaseShopProductLocalisation;
use App\Models\Data\DataLocalisation;
use App\Facades\NavigationFacade;
use App\Facades\MetaSeoFacade as MetaSeo;
use App\Facades\MetaContentFacade as MetaContent;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ShopProductController extends Controller
{
    public function __construct()
    {
        $this->pageType = 5;
    }

    //Список товаров для листинга
    public function index()
    {
        $getPagesList = BaseShopProduct::orderBy('id')->get();

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

            $listPages[] = $pageData;
        }

        return [
            'listLanguages' => $this->languagesData(),
            'listPages' => $listPages ?? [],
        ];
    }

    //Добавление записи
    public function store(Request $request)
    {
        $slug = NavigationFacade::generationUrl($request->pageName);

        $postPage = new BaseShopProduct();
        $postPage->status = $request->pageStatus;
        $postPage->slug = $slug;
        $postPage->name = trim($request->pageName);
        $postPage->title = trim($request->pageTitle);
        $postPage->description = trim($request->pageDescription);
        $postPage->contents = trim($request->pageContent);
        $postPage->image_list = serialize($request->pageImageList);
        $postPage->unique_code = trim($request->pageProductCode);
        $postPage->price = trim($request->pagePrice);
        $postPage->price_old = trim($request->pagePriceOld);
        $postPage->brand_id = trim($request->pageBrandId);
        $postPage->specials = trim($request->pageSpecials);
        $postPage->recommended = trim($request->pageRecommended);
        $postPage->save();

        NavigationFacade::addNavigation($slug, $postPage->id, $this->pageType, $request->pageStatus);

        $this->addLinkShopCategoryProduct($postPage->id, $request->pageStatus, $request->pageCategories);

        return ['id' => $postPage->id];
    }

    //Получаем данные записи
    public function show(int $id): object
    {
        $dataPage = BaseShopProduct::find($id);

        $page = (object)[];
        $page->meta = MetaSeo::pageSeo($this->pageType, $dataPage);
        $page->content = MetaContent::pageContent($this->pageType, $dataPage);
        $page->brand = (new ShopBrandController())->show($dataPage->brand_id);
        $page->relatedProducts = (new ShopProductController())->productsNew(8);

        return $page;
    }

    //Выборка новых товаров
    public function productsNew(int $limit): array
    {
        $getList = BaseShopProduct::where('status', 1)->orderBy('id')->limit($limit)->get();
        $list = [];
        foreach ($getList as $item) {
            $list[] = $this->showInListFormat($item);
        }
        return $list;
    }

    //Выборка популярных товаров
    public function productsTop(int $limit): array
    {
        $getList = BaseShopProduct::where('status', 1)->orderBy('views')->limit($limit)->get();
        $list = [];
        foreach ($getList as $item) {
            $list[] = $this->showInListFormat($item);
        }
        return $list;
    }

    //Выборка специальных предложений товаров
    public function productsSpecials(int $limit): array
    {
        $getList = BaseShopProduct::where('status', 1)
            ->where('specials', 1)
            ->limit($limit)
            ->get();
        $list = [];
        foreach ($getList as $item) {
            $list[] = $this->showInListFormat($item);
        }
        return $list;
    }

    //Выборка специальных предложений товаров
    public function productsRecommended(int $limit): array
    {
        $getList = BaseShopProduct::where('status', 1)
            ->where('recommended', 1)
            ->limit($limit)
            ->get();
        $list = [];
        foreach ($getList as $item) {
            $list[] = $this->showInListFormat($item);
        }
        return $list;
    }

    //Форматируем товар для листинга
    private function showInListFormat(object $data): array
    {
        $images = unserialize($data['image_list']);
        $imageProductOne = '';
        $imageProductTwo = '';
        if (count($images) > 0) {
            $imageProductOne = $images[0]['url'];
            $imageProductTwo = $images[1]['url'];
        }

        return [
            'id' => $data->id,
            'slug' => '/' . $data->slug,
            'name' => $data->name,
            'price' => $data->price,
            'price_old' => $data->price_old,
            'image_1' => $imageProductOne,
            'image_2' => $imageProductTwo,
        ];
    }

    //Получаем данные для редактирования записи
    public function edit(int $id, Request $request)
    {
        $lang = $request->lang;
        if (trim($lang) == '') {
            $page = BaseShopProduct::find($id);
        } else {
            $getLocale = DataLocalisation::where('prefix', trim($lang))->where('status', 1)->first();
            if (isset($getLocale->id)) {
                $page = BaseShopProductLocalisation::where('page_id', $id)
                    ->where('localisation_id', $getLocale->id)
                    ->first();
                $pageMainLang = BaseShopProduct::find($id);
            }
        }

        //Запрашиваем категории записи
        $getPageCategories = BaseShopCategoryProduct::where('post_id', $id)->get();
        $listCategories = [];
        foreach ($getPageCategories as $item) {
            $listCategories[] = $item->category_id;
        }
        //Запрашиваем категории записи

        $languages = $this->languagesData();

        return [
            'pageLang' => $lang == '' ? $lang : $languages['langMain']['prefix'],
            'pageLangMainName' => $pageMainLang->name ?? '',
            'pageId' => $pageMainLang->id ?? $page->id,
            'pageStatus' => $page->status ?? $pageMainLang->status,          //Статус записи
            'pageSlug' => isset($page->slug) ? '/' . $page->slug : $pageMainLang->slug,           //Ссылка на страницу
            'pageName' => $page->name ?? '',           //Название страницы
            'pageContent' => $page->contents ?? '',    //Контент страницы
            'pageTitle' => $page->title ?? '',          //Title страницы
            'pageDescription' => $page->description ?? '',    //Description страницы
            'pageImageList' => isset($page->image_list) ? unserialize($page->image_list) : unserialize($pageMainLang->image_list),      //Фото товаров
            'pageProductCode' => $page->unique_code ?? '',    //Артикул
            'pagePrice' => $page->price ?? 0,           //Цена товара
            'pagePriceOld' => $page->price_old ?? 0,       //Старая цена товара
            'pageBrandId' => $page->brand_id ?? 1,         //ID производителя
            'pageSpecials' => $page->specials ?? 0,        //Специальное предложение
            'pageRecommended' => $page->recommended ?? 0,  //Рекомендуемый товар
            'pageCategories' => $listCategories,     //Категории товара
            'listLanguages' => $languages, //Список языков
        ];
    }

    //Обновляем запись
    public function update(Request $request, string $id)
    {
        $lang = $request->pageLang;
        $langData = $this->languagesData();
        if ($lang == $langData['langMain']['prefix']) {
            $postPage = BaseShopProduct::find($id);
            $postPage->status = $request->pageStatus;
            $postPage->name = trim($request->pageName);
            $postPage->title = trim($request->pageTitle);
            $postPage->description = trim($request->pageDescription);
            $postPage->contents = trim($request->pageContent);
            $postPage->image_list = serialize($request->pageImageList);
            $postPage->unique_code = trim($request->pageProductCode);
            $postPage->price = trim($request->pagePrice);
            $postPage->price_old = trim($request->pagePriceOld);
            $postPage->brand_id = trim($request->pageBrandId);
            $postPage->specials = trim($request->pageSpecials);
            $postPage->recommended = trim($request->pageRecommended);
            $postPage->save();

            //Добавляем связи категорий
            $this->addLinkShopCategoryProduct($id, $request->pageStatus, $request->pageCategories);
        } else {
            $getLocale = DataLocalisation::where('prefix', trim($lang))
                ->where('status', 1)
                ->first();
            if (isset($getLocale->id)) {
                $postPage = BaseShopProductLocalisation::where('page_id', $id)
                    ->where('localisation_id', $getLocale->id)
                    ->first();
                if (isset($postPage->id)) {
                    $postPage->name = trim($request->pageName);
                    $postPage->title = trim($request->pageTitle);
                    $postPage->description = trim($request->pageDescription);
                    $postPage->contents = trim($request->pageContent);
                    $postPage->save();
                } else {
                    $postPage = new BaseShopProductLocalisation();
                    $postPage->page_id = $id;
                    $postPage->localisation_id = $getLocale->id;
                    $postPage->name = trim($request->pageName);
                    $postPage->title = trim($request->pageTitle);
                    $postPage->description = trim($request->pageDescription);
                    $postPage->contents = trim($request->pageContent);
                    $postPage->save();
                }
            }
        }



        return ['id' => $id];
    }

    //Удаляем запись и связанные данные
    public function destroy(string $id)
    {
        BaseShopProduct::where('id', $id)->delete();
        BaseShopProductLocalisation::where('page_id', $id)->delete();
        BaseShopCategoryProduct::where('post_id', $id)->delete();
        BaseNavigation::where('page_id', $id)->where('page_type', $this->pageType)->delete();
    }

    //Получаем наличий локализации страницы
    private function languageVersionsPage(int $id)
    {
        $languageVersionsPage = BaseShopProductLocalisation::where('page_id', $id)->get();
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
    private function langDataID(string $langID): array
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
    private function languagesData(string $lang = ''): array
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



    //Связывание категорий с товарами
    private function addLinkShopCategoryProduct(int $id, int $status, array $categories): void
    {
        //Удаление старые связки категорий и записи
        BaseShopCategoryProduct::where('post_id', $id)->delete();
        if (count($categories) > 0) {
            foreach ($categories as $item) {
                BaseShopCategoryProduct::insert([
                    'status' => $status,
                    'category_id' => $item,
                    'post_id' => $id,
                    'post_views' => 0,
                ]);
            }
        } else {
            BaseShopCategoryProduct::insert([
                'status' => $status,
                'category_id' => 1,
                'post_id' => $id,
                'post_views' => 0,
            ]);
        }
    }
}
