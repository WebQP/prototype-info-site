<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Database\Seeders\Base\BasePageSeeder;
use Database\Seeders\Base\BasePagesLocalisationSeeder;
use Database\Seeders\Base\Blog\Category\BaseBlogCategorySeeder;
use Database\Seeders\Base\Shop\BaseShopBrandSeeder;
use Database\Seeders\Base\Shop\BaseShopCategorySeeder;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            //Контент
            BasePageSeeder::class,
            BaseBlogCategorySeeder::class,
            BasePagesLocalisationSeeder::class,

            //Магазин
            BaseShopCategorySeeder::class,
            BaseShopBrandSeeder::class,
        ]);
    }
}
