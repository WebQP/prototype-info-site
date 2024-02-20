<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('base_shop_products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedTinyInteger('status')->default(1)->comment('Статус записи');
            $table->string('slug')->index()->unique()->comment('URI страницы');
            $table->unsignedBigInteger('views')->default(0)->comment('Просмотров');
            $table->string('name')->default('')->comment('Дефолтное название страницы');
            $table->text('title')->nullable()->comment('Дефолтный Title');
            $table->text('description')->nullable()->comment('Дефолтный Description');
            $table->text('contents')->nullable()->comment('Дефолтный контент страницы');
            $table->text('image_list')->comment('Галерея изображений');
            $table->string('unique_code')->default('')->comment('Артикул');
            $table->decimal('price', 10)->default(0)->comment('Цена');
            $table->decimal('price_old', 10)->default(0)->comment('Цена старая');
            $table->unsignedInteger('brand_id')->default(0)->comment('ID бренда');
            $table->tinyInteger('specials')->default(0)->comment('Специальное предложение');
            $table->tinyInteger('recommended')->default(0)->comment('Рекомендуемый товар');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('base_shop_products');
    }
};
