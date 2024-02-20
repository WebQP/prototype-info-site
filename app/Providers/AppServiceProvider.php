<?php

namespace App\Providers;

use App\Models\Base\Blog\Categories\BaseBlogCategory;
use App\Models\Base\Blog\Categories\BaseBlogCategoryLocalisation;
use App\Models\Base\Blog\Posts\BaseBlogPost;
use App\Models\Base\Blog\Posts\BaseBlogPostLocalisation;
use App\Models\Base\Pages\BasePage;
use App\Models\Base\Pages\BasePageLocalisation;
use App\Models\Base\Shop\BaseShopBrand;
use App\Models\Base\Shop\BaseShopBrandLocalisation;
use App\Models\Base\Shop\BaseShopCategory;
use App\Models\Base\Shop\BaseShopCategoryLocalisation;
use App\Models\Base\Shop\BaseShopProduct;
use App\Models\Base\Shop\BaseShopProductLocalisation;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singleton('typePage', function ($app) {
            return [
                1 => [
                    'model' => new BasePage(),
                    'local' => new BasePageLocalisation()
                ],
                2 => [
                    'model' => new BaseBlogCategory(),
                    'local' => new BaseBlogCategoryLocalisation()
                ],
                3 => [
                    'model' => new BaseBlogPost(),
                    'local' => new BaseBlogPostLocalisation()
                ],
                4 => [
                    'model' => new BaseShopCategory(),
                    'local' => new BaseShopCategoryLocalisation()
                ],
                5 => [
                    'model' => new BaseShopProduct(),
                    'local' => new BaseShopProductLocalisation()
                ],
                6 => [
                    'model' => new BaseShopBrand(),
                    'local' => new BaseShopBrandLocalisation()
                ],
            ];
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useBootstrap();
    }
}
