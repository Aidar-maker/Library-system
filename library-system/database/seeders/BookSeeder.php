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
                'title' => '1984',
                'author' => 'Джордж Оруэлл',
                'isbn' => '978-0-452-28423-4',
                'year' => 1949,
                'genre' => 'Антиутопия',
                'description' => 'Антиутопия о тоталитарном государстве и слежке за личностью.',
                'cover_url' => 'https://content.img-gorod.ru/pim/products/images/32/35/018fa181-c3a1-71c2-9c65-fc39869e3235.jpg',
                'is_available' => true,
            ],
            [
                'title' => 'Скотный двор',
                'author' => 'Джордж Оруэлл',
                'isbn' => '978-0-452-28424-1',
                'year' => 1945,
                'genre' => 'Аллегория',
                'description' => 'Аллегорическая повесть о революции и установлении диктатуры.',
                'cover_url' => 'https://avatars.mds.yandex.net/get-mpic/6219218/img_id3279858125270937508.jpeg/orig',
                'is_available' => true,
            ],
            [
                'title' => 'Гарри Поттер и философский камень',
                'author' => 'Дж. К. Роулинг',
                'isbn' => '978-0-7475-3269-9',
                'year' => 1997,
                'genre' => 'Фэнтези',
                'description' => 'Первая книга о юном волшебнике Гарри Поттере.',
                'cover_url' => 'https://avatars.mds.yandex.net/get-mpic/11695497/2a00000195d9ea2508d2df8516b7dd27fc80/orig',
                'is_available' => true,
            ],
            [
                'title' => 'Маленький принц',
                'author' => 'Антуан де Сент-Экзюпери',
                'isbn' => '978-2-07-036530-6',
                'year' => 1943,
                'genre' => 'Философская сказка',
                'description' => 'Философская сказка о дружбе, любви и жизни.',
                'cover_url' => 'https://avatars.mds.yandex.net/get-mpic/12418417/2a0000018d46969dac7137cb85490fb277b2/orig',
                'is_available' => true,
            ],
            [
                'title' => 'Властелин колец',
                'author' => 'Дж. Р. Р. Толкин',
                'isbn' => '978-0-544-00341-5',
                'year' => 1954,
                'genre' => 'Фэнтези',
                'description' => 'Эпическая сага о борьбе добра и зла в Средиземье.',
                'cover_url' => 'https://avatars.mds.yandex.net/i?id=90d37e72d1e4b4c1d96b3c22db6cf490_l-9380290-images-thumbs&n=13',
                'is_available' => true,
            ],
            [
                'title' => 'Хроники Нарнии',
                'author' => 'Клайв С. Льюис',
                'isbn' => '978-0-06-440499-4',
                'year' => 1950,
                'genre' => 'Фэнтези',
                'description' => 'Серия книг о приключениях детей в волшебной стране Нарнии.',
                'cover_url' => 'https://img.votonia.ru/products/5f9c63cba92e1.jpg',
                'is_available' => true,
            ],
            [
                'title' => 'Алиса в Стране чудес',
                'author' => 'Льюис Кэрролл',
                'isbn' => '978-0-7475-4512-5',
                'year' => 1865,
                'genre' => 'Приключения',
                'description' => 'История девочки Алисы, упавшей в кроличью нору.',
                'cover_url' => 'https://avatars.mds.yandex.net/get-mpic/4219828/img_id7235137386550873031.jpeg/orig',
                'is_available' => true,
            ],
            [
                'title' => 'Робинзон Крузо',
                'author' => 'Даниель Дефо',
                'isbn' => '978-0-14-143963-1',
                'year' => 1719,
                'genre' => 'Приключения',
                'description' => 'История моряка, оказавшегося на необитаемом острове.',
                'cover_url' => 'https://cdn1.ozone.ru/s3/multimedia-1-v/7080143827.jpg',
                'is_available' => true,
            ],
            [
                'title' => 'Граф Монте-Кристо',
                'author' => 'Александр Дюма',
                'isbn' => '978-0-14-044926-6',
                'year' => 1844,
                'genre' => 'Приключения',
                'description' => 'Роман о мести, любви и дружбе.',
                'cover_url' => 'https://cdn.eksmo.ru/v2/ITDA00000000053058/COVER/cover__w820.jpg',
                'is_available' => true,
            ],
            [
                'title' => 'Три мушкетёра',
                'author' => 'Александр Дюма',
                'isbn' => '978-0-14-044927-3',
                'year' => 1844,
                'genre' => 'Приключения',
                'description' => 'Приключения д’Артаньяна и его друзей.',
                'cover_url' => 'https://avatars.mds.yandex.net/get-mpic/5189780/img_id6916449291373786119.jpeg/orig',
                'is_available' => true,
            ],
            [
                'title' => 'Двадцать тысяч лье под водой',
                'author' => 'Жюль Верн',
                'isbn' => '978-0-7432-7356-5',
                'year' => 1870,
                'genre' => 'Научная фантастика',
                'description' => 'Приключения капитана Немо на подводной лодке Наутилус.',
                'cover_url' => 'https://avatars.mds.yandex.net/i?id=0872252071df565936735e59e113b7b3_l-5236101-images-thumbs&n=13',
                'is_available' => true,
            ],
            [
                'title' => 'Путешествие к центру Земли',
                'author' => 'Жюль Верн',
                'isbn' => '978-0-7432-7357-2',
                'year' => 1864,
                'genre' => 'Приключения',
                'description' => 'Путешествие профессора Лидена по подземному миру.',
                'cover_url' => 'https://avatars.mds.yandex.net/get-mpic/1674591/2a0000018a5a14a8e8dc445a55b7bf6852fd/orig',
                'is_available' => true,
            ],
            [
                'title' => 'Том Сойер',
                'author' => 'Марк Твен',
                'isbn' => '978-0-486-40077-6',
                'year' => 1876,
                'genre' => 'Приключения',
                'description' => 'Приключения мальчика на берегу Миссисипи.',
                'cover_url' => 'https://avatars.mds.yandex.net/get-mpic/5209949/img_id4096950681613043601.jpeg/orig',
                'is_available' => true,
            ],
            [
                'title' => 'Гекльберри Финн',
                'author' => 'Марк Твен',
                'isbn' => '978-0-486-40078-3',
                'year' => 1884,
                'genre' => 'Приключения',
                'description' => 'Продолжение приключений Тома Сойера и Гека Финна.',
                'cover_url' => 'https://avatars.mds.yandex.net/get-mpic/5116414/2a00000190508f7b130e4f0e7b16da77be0a/orig',
                'is_available' => true,
            ],
            [
                'title' => 'Повелитель мух',
                'author' => 'Уильям Голдинг',
                'isbn' => '978-0-571-05686-2',
                'year' => 1954,
                'genre' => 'Аллегория',
                'description' => 'Аллегория о природе человека и цивилизации.',
                'cover_url' => 'https://cdn1.ozone.ru/s3/multimedia-1-w/7198788740.jpg',
                'is_available' => true,
            ],
            [
                'title' => 'Убить пересмешника',
                'author' => 'Харпер Ли',
                'isbn' => '978-0-06-112008-4',
                'year' => 1960,
                'genre' => 'Роман',
                'description' => 'Роман о расизме и предрассудках в южном штате США.',
                'cover_url' => 'https://avatars.mds.yandex.net/get-mpic/6219218/img_id2062937745997083843.jpeg/orig',
                'is_available' => true,
            ],
            [
                'title' => 'Джейн Эйр',
                'author' => 'Шарлотта Бронте',
                'isbn' => '978-0-14-143956-3',
                'year' => 1847,
                'genre' => 'Роман',
                'description' => 'Роман о жизни и любви гувернантки Джейн Эйр.',
                'cover_url' => 'https://avatars.mds.yandex.net/get-mpic/4407580/img_id6130573108950070127.jpeg/orig',
                'is_available' => true,
            ],
            [
                'title' => 'Гордость и предубеждение',
                'author' => 'Джейн Остин',
                'isbn' => '978-0-14-143951-8',
                'year' => 1813,
                'genre' => 'Роман',
                'description' => 'Роман о любви и браке в английском обществе XIX века.',
                'cover_url' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/5/5e/Pride_and_Prejudice_1st_edition.jpg/220px-Pride_and_Prejudice_1st_edition.jpg',
                'is_available' => true,
            ],
            [
                'title' => 'Дракула',
                'author' => 'Брэм Стокер',
                'isbn' => '978-0-486-41109-5',
                'year' => 1897,
                'genre' => 'Готика',
                'description' => 'Роман ужасов о графе Дракуле.',
                'cover_url' => 'https://upload.wikimedia.org/wikipedia/commons/1/1e/Dracamer99.jpg',
                'is_available' => true,
            ],
            [
                'title' => 'Франкенштейн',
                'author' => 'Мэри Шелли',
                'isbn' => '978-0-14-143947-1',
                'year' => 1818,
                'genre' => 'Научная фантастика',
                'description' => 'Роман о создании искусственной жизни.',
                'cover_url' => 'https://i.pinimg.com/originals/a0/45/03/a04503a266527c737c93e50973de9bbb.jpg',
                'is_available' => true,
            ],
            [
                'title' => 'Над пропастью во ржи',
                'author' => 'Джером Д. Сэлинджер',
                'isbn' => '978-0-316-76948-0',
                'year' => 1951,
                'genre' => 'Роман',
                'description' => 'Роман о подростке Холдене Колфилде.',
                'cover_url' => 'https://avatars.mds.yandex.net/get-mpic/4428744/img_id7477030184269754342.jpeg/orig',
                'is_available' => true,
            ],
            [
                'title' => 'Метро 2033',
                'author' => 'Дмитрий Глуховский',
                'isbn' => '978-5-17-053862-8',
                'year' => 2005,
                'genre' => 'Постапокалипсис',
                'description' => 'Роман о выживании людей в московском метро после ядерной войны.',
                'cover_url' => 'https://content.img-gorod.ru/pim/products/images/91/74/019309ed-7f84-771e-b1f0-a0d2fefe9174.jpg',
                'is_available' => true,
            ],
            [
                'title' => 'Метро 2034',
                'author' => 'Дмитрий Глуховский',
                'isbn' => '978-5-17-056722-2',
                'year' => 2009,
                'genre' => 'Постапокалипсис',
                'description' => 'Продолжение романа "Метро 2033".',
                'cover_url' => 'https://content.img-gorod.ru/pim/products/images/3c/97/019309ed-7ceb-7641-b171-96a31bf03c97.jpg',
                'is_available' => true,
            ],
            [
                'title' => 'Три товарища',
                'author' => 'Эрих Мария Ремарк',
                'isbn' => '978-3-453-13248-5',
                'year' => 1936,
                'genre' => 'Роман',
                'description' => 'Роман о дружбе и любви в Германии накануне Второй мировой войны.',
                'cover_url' => 'https://avatars.mds.yandex.net/i?id=a2159f9220b060469ecabac48769ede4_l-15526020-images-thumbs&n=13',
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