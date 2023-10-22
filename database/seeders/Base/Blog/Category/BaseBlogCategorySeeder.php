<?php

namespace Database\Seeders\Base\Blog\Category;

use App\Models\Base\BaseNavigation;
use App\Models\Base\Blog\Categories\BaseBlogCategory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class BaseBlogCategorySeeder extends Seeder
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
                'slug' => 'news',
                'name' => 'Новости',
            ],
        ];
        foreach ($list as $item) {
            $getItem = BaseBlogCategory::where('slug', $item['slug'])->first();
            if (!isset($getItem->id)) {
                $postPage = BaseBlogCategory::insertGetId(
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
                    'page_type' => 2,
                    'created_at' => $createDate,
                    'updated_at' => $createDate,
                ]);
            }
        }
    }
}
