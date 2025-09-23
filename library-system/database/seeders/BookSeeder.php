<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Массив с данными для тестовых книг
        $books = [
            [
                'title' => 'Война и мир',
                'author' => 'Лев Толстой',
                'isbn' => '978-5-17-079111-5',
                'year' => 1869,
                'genre' => 'Роман',
                'description' => 'Эпическое произведение, описывающее события Napoleonic Wars...',
                'cover_url' => null,
                'is_available' => true,
            ],
            [
                'title' => 'Преступление и наказание',
                'author' => 'Фёдор Достоевский',
                'isbn' => '978-5-17-079112-2',
                'year' => 1866,
                'genre' => 'Роман',
                'description' => 'Роман о молодом студенте Раскольникове...',
                'cover_url' => null,
                'is_available' => true,
            ],
            [
                'title' => 'Мастер и Маргарита',
                'author' => 'Михаил Булгаков',
                'isbn' => '978-5-17-081113-9',
                'year' => 1967,
                'genre' => 'Роман, Фэнтези',
                'description' => 'Один из лучших романов XX века...',
                'cover_url' => null,
                'is_available' => true,
            ],
            [
                'title' => 'Анна Каренина',
                'author' => 'Лев Толстой',
                'isbn' => '978-5-17-079114-6',
                'year' => 1878,
                'genre' => 'Роман',
                'description' => 'Роман о любви и трагедии...',
                'cover_url' => null,
                'is_available' => true,
            ],
            [
                'title' => 'Евгений Онегин',
                'author' => 'Александр Пушкин',
                'isbn' => '978-5-17-079115-3',
                'year' => 1833,
                'genre' => 'Поэма',
                'description' => 'Роман в стихах...',
                'cover_url' => null,
                'is_available' => true,
            ],
            [
                'title' => 'Отцы и дети',
                'author' => 'Иван Тургенев',
                'isbn' => '978-5-17-079116-0',
                'year' => 1862,
                'genre' => 'Роман',
                'description' => 'Роман, отражающий конфликт поколений...',
                'cover_url' => null,
                'is_available' => true,
            ],
            [
                'title' => 'Горе от ума',
                'author' => 'Александр Грибоедов',
                'isbn' => '978-5-17-079117-7',
                'year' => 1833,
                'genre' => 'Комедия',
                'description' => 'Сатирическая комедия...',
                'cover_url' => null,
                'is_available' => true,
            ],
            [
                'title' => 'Мёртвые души',
                'author' => 'Николай Гоголь',
                'isbn' => '978-5-17-079118-4',
                'year' => 1842,
                'genre' => 'Поэма',
                'description' => 'Поэма-повесть о Чичикове...',
                'cover_url' => null,
                'is_available' => true,
            ],
            [
                'title' => 'Обломов',
                'author' => 'Иван Гончаров',
                'isbn' => '978-5-17-079119-1',
                'year' => 1859,
                'genre' => 'Роман',
                'description' => 'Роман о лени и апатии...',
                'cover_url' => null,
                'is_available' => true,
            ],
            [
                'title' => 'Герой нашего времени',
                'author' => 'Михаил Лермонтов',
                'isbn' => '978-5-17-079120-7',
                'year' => 1840,
                'genre' => 'Роман',
                'description' => 'Психологический портрет "лишнего человека"...',
                'cover_url' => null,
                'is_available' => true,
            ],
        ];

        // Вставляем книги в базу данных
        foreach ($books as $bookData) {
            // Проверяем, существует ли книга с таким ISBN
            if (!DB::table('books')->where('isbn', $bookData['isbn'])->exists()) {
                DB::table('books')->insert($bookData);
            }
        }

        $this->command->info('Тестовые книги добавлены.');
    }
}