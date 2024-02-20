<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Content\PageController;
use App\Http\Controllers\Content\Shop\ShopCartController;
use App\Http\Controllers\Content\Shop\ShopCategoryController;
use App\Http\Controllers\Content\Shop\ShopProductController;
use App\Models\Base\BaseNavigation;
use Illuminate\Http\Request;

class BaseNavigationController extends Controller
{
    public function __construct()
    {
        $this->sidebar = (new DataOtherController())->sadeBarData();
    }

    public function index()
    {
        $data = (new PageController())->show(1);
        $data->sidebar = $this->sidebar;
        return view('site.pages.home', compact('data'));
    }

    //Вызов корзины
    public function cart()
    {
        $data = (new ShopCartController())->show();
        $data->sidebar = $this->sidebar;
        return view('site.shop.cart', compact('data'));
    }

    //Навигация
    public function route($slag)
    {
        $page = BaseNavigation::where('slug', $slag)->firstOrFail();

        if ($page->page_type == 1) {
            $data = (new PageController())->show($page->page_id);
            $data->sidebar = $this->sidebar;
            if ($page->page_id == 2) {
                return view('site.contact', compact('data'));
            }
            return view('site.pages.info', compact('data'));
        } elseif ($page->page_type == 2) {
            $data = (new BlogPostController())->show($page->page_id);
            return view('site.pages.blog.blog-post', compact('data'));
        } elseif ($page->page_type == 3) {
            $data = (new BlogPostController())->show($page->page_id);
            return view('site.pages.blog.blog-post', compact('data'));
        } elseif ($page->page_type == 4) {
            //Магазин категории
            $data = (new ShopCategoryController())->show($page->page_id);
            $data->sidebar = $this->sidebar;
            return view('site.shop.catalog', compact('data'));
        } elseif ($page->page_type == 5) {
            //Магазин товар
            $data = (new ShopProductController())->show($page->page_id);
            $data->sidebar = $this->sidebar;
            return view('site.shop.product', compact('data'));
        }
    }
    //Навигация
}
