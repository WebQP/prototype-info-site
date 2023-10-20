<?php

namespace Database\Seeders\Base;

use App\Models\Base\BaseNavigation;
use App\Models\Base\Pages\BasePage;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class BasePageSeeder extends Seeder
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
                'slug' => '/',
                'name' => 'Главная страница',
            ],
            [
                'status' => 1,
                'status_delete' => 0,
                'slug' => 'contacts',
                'name' => 'Контакты',
            ],
            [
                'status' => 1,
                'status_delete' => 0,
                'slug' => 'politika-konfendicialnosti',
                'name' => 'Политика конфендициальности',
            ],
        ];
        foreach ($list as $item) {
            $getItem = BasePage::where('slug', $item['slug'])->first();
            if (!isset($getItem->id)) {
                $postPage = BasePage::insertGetId(
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
                    'page_type' => 1,
                    'created_at' => $createDate,
                    'updated_at' => $createDate,
                ]);
            }
        }
    }
}
