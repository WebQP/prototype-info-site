<?php

/* Таблица - данные - навигация */

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('base_navigations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedTinyInteger('status')->default(1)->comment('Статус записи');
            $table->string('slug')->index()->unique()->comment('URI страницы');
            $table->unsignedBigInteger('page_id')->comment('ID страницы');
            $table->unsignedTinyInteger('page_type')->comment('Тип страницы');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('base_navigations');
    }
};
