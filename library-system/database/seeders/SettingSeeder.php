<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Setting;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Срок выдачи по умолчанию 14 дней
        Setting::set("loan_period_days","14", "Срок выдачи книги");
        //Ставка штрафа по умолчаниб 10 рублей
        Setting::set("fine_rate_per_day","10","Ставка штрафа в рублях");
        $this->command->info("Настройки добавлены");
    }
}
