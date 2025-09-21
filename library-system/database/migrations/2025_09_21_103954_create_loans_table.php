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
        Schema::create('loans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Читатель
            $table->foreignId('book_id')->constrained()->onDelete('cascade'); // Книга
            $table->date('issued_at'); // Дата выдачи
            $table->date('due_at'); // Срок возврата (issued_at + 14 дней)
            $table->date('returned_at')->nullable(); // Дата возврата (если null - книга еще не возвращена)
            $table->decimal('fine_amount', 8, 2)->default(0); // Размер штрафа
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('loans');
    }
};
