<?php

/* Таблица - набор данных - локализации */

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('data_localisations', function (Blueprint $table) {
            $table->id();
            $table->unsignedTinyInteger('status')->default(0)->comment('Статус записи');
            $table->string('name')->unique()->comment('Название языка');
            $table->string('prefix')->unique()->comment('Префикс языка');
            $table->string('preview_image')->unique()->comment('Флаг языка');
            $table->unsignedTinyInteger('main')->default(0)->comment('Основной язык');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('data_localisations');
    }
};
