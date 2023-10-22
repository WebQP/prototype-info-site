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
        Schema::create('base_blog_categories_posts', function (Blueprint $table) {
            $table->id();
            $table->unsignedTinyInteger('status')->default(1)->comment('Статус записи');
            $table->unsignedBigInteger('category_id')->default(0)->comment('ID категории');
            $table->unsignedBigInteger('post_id')->default(0)->comment('ID записи');
            $table->unsignedBigInteger('post_views')->default(0)->comment('Просмотров');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('base_blog_categories_posts');
    }
};
