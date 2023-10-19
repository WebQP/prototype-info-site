<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Database\Seeders\Base\BaseBlogCategorySeeder;
use Database\Seeders\Base\BasePageSeeder;
use Database\Seeders\Base\BasePagesLocalisationSeeder;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            BasePageSeeder::class,
            BaseBlogCategorySeeder::class,
            BasePagesLocalisationSeeder::class,
        ]);
    }
}
