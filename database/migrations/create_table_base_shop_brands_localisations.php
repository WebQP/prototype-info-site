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
        Schema::create('base_shop_brands_localisations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('page_id')->default(0)->comment('ID страницы');
            $table->unsignedInteger('localisation_id')->default(0)->comment('ID локализации');
            $table->unsignedTinyInteger('status')->default(1)->comment('Статус локализации');
            $table->string('name')->default('')->comment('Название страницы');
            $table->text('title')->comment('Title');
            $table->text('description')->comment('Description');
            $table->text('contents')->comment('Контент страницы');
            $table->string('preview_image')->default('')->comment('Изображение страницы');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('base_shop_brands_localisations');
    }
};
