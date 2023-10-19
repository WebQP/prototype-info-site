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
        Schema::create('base_blog_categories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedTinyInteger('status')->default(1)->comment('Статус записи');
            $table->unsignedTinyInteger('status_delete')->default(1)->comment('Статус удаляемой страницы');
            $table->unsignedInteger('parent_id')->default(0)->comment('ID категории');
            $table->string('slug')->index()->unique()->comment('URI страницы');
            $table->string('name')->default('')->comment('Дефолтное название страницы');
            $table->text('title')->nullable()->comment('Дефолтный Title');
            $table->text('description')->nullable()->comment('Дефолтный Description');
            $table->text('contents')->nullable()->comment('Дефолтный контент страницы');
            $table->string('preview_image')->default('')->comment('Дефолтное изображение страницы');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('base_blog_categories');
    }
};
