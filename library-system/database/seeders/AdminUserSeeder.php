<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Проверяем, существует ли уже администратор
        $existingAdmin = User::where('email', 'admin@example.com')->first();

        if (!$existingAdmin) {
            User::create([
                'name' => 'Администратор',
                'email' => 'admin@example.com',
                'password' => Hash::make('password'), // Пароль по умолчанию: 'password'
                'is_admin' => true,
            ]);
            $this->command->info('Администратор создан: admin@example.com / password');
        } else {
            $this->command->info('Администратор уже существует.');
        }
    }
}