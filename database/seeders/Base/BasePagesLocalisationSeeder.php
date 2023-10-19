<?php

namespace Database\Seeders\Base;

use App\Models\DataLocalisation;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class BasePagesLocalisationSeeder extends Seeder
{
    public function run(): void
    {
        $list = [
            [1,'Русский','ru','/assets/admin/images/langs/ru.png',1],
            [1,'English','en','/assets/admin/images/langs/en.png',0],
            [0,'Spanish','es','/assets/admin/images/langs/es.png',0],
            [0,'German','de','/assets/admin/images/langs/de.png',0],
        ];
        foreach ($list as $item) {
            $getItem = DataLocalisation::where('name', $item[0])->where('prefix', $item[1])->first();
            if (!isset($getItem->id)) {
                DataLocalisation::insert(
                    [
                        'status' => $item[0],
                        'name' => $item[1],
                        'prefix' => $item[2],
                        'preview_image' => $item[3],
                        'main' => $item[4],
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ]
                );
            }
        }
    }
}
