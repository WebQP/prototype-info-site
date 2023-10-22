<?php

namespace Database\Seeders\Base\Shop;

use App\Models\Base\BaseNavigation;
use App\Models\Base\Shop\BaseShopBrand;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class BaseShopBrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $createDate = Carbon::now();
        $list = [
            [
                'status' => 1,
                'status_delete' => 0,
                'slug' => 'no-brand',
                'name' => 'Без бренда',
            ],
        ];
        foreach ($list as $item) {
            $getItem = BaseShopBrand::where('slug', $item['slug'])->first();
            if (!isset($getItem->id)) {
                $postPage = BaseShopBrand::insertGetId(
                    [
                        'status' => $item['status'],
                        'status_delete' => $item['status_delete'],
                        'slug' => $item['slug'],
                        'name' => $item['name'],
                        'created_at' => $createDate,
                        'updated_at' => $createDate,
                    ]
                );
                BaseNavigation::insert([
                    'status' => $item['status'],
                    'slug' => $item['slug'],
                    'page_id' => $postPage,
                    'page_type' => 6,
                    'created_at' => $createDate,
                    'updated_at' => $createDate,
                ]);
            }
        }
    }
}
