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
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('title'); // Название
            $table->string('author'); // Автор
            $table->string('isbn')->unique(); // ISBN
            $table->integer('year'); // Год
            $table->string('genre'); // Жанр
            $table->text('description')->nullable(); // Описание
            $table->string('cover_url')->nullable(); // URL обложки
            $table->boolean('is_available')->default(true); // Статус: доступна ли для выдачи
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};
