<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Content\PageController;
use App\Models\Base\BaseNavigation;
use Illuminate\Http\Request;

class BaseNavigationController extends Controller
{
    public function index()
    {
        $data = (new PageController())->show(1);
        return view('site.pages.home', compact('data'));
    }

    //Навигация
    public function route($slag)
    {
        $page = BaseNavigation::where('slug', $slag)->firstOrFail();

        if ($page->page_type == 1) {
            $data = (new BlogCategoryController())->show($page->page_id);
            return view('site.pages.blog.blog-listing', compact('data'));
        }
        elseif ($page->page_type == 2) {
            $data = (new BlogPostController())->show($page->page_id);
            return view('site.pages.blog.blog-post', compact('data'));
        }
        elseif ($page->page_type == 3) {
            $data = (new BlogPostController())->show($page->page_id);
            return view('site.pages.blog.blog-post', compact('data'));
        }
        elseif ($page->page_type == 4) {
            $data = (new BlogPostController())->show($page->page_id);
            return view('site.pages.blog.blog-post', compact('data'));
        }
    }
    //Навигация
}
