<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setting;

class SettingController extends Controller
{
    public function index()
    {
        $settings = Setting::all()->keyBy('key'); // Получаем все настройки, индексированные по ключу
        return view('admin.settings.index', compact('settings'));
    }

    public function update(Request $request)
    {
        $validatedData = $request->validate([
            'loan_period_days' => 'required|integer|min:1|max:365',
            'fine_rate_per_day' => 'required|numeric|min:0',
        ], [
            'loan_period_days.required' => 'Поле "Срок выдачи" обязательно.',
            'loan_period_days.integer' => 'Поле "Срок выдачи" должно быть целым числом.',
            'loan_period_days.min' => 'Поле "Срок выдачи" должно быть не менее 1 дня.',
            'loan_period_days.max' => 'Поле "Срок выдачи" должно быть не более 365 дней.',
            'fine_rate_per_day.required' => 'Поле "Ставка штрафа" обязательно.',
            'fine_rate_per_day.numeric' => 'Поле "Ставка штрафа" должно быть числом.',
            'fine_rate_per_day.min' => 'Поле "Ставка штрафа" не может быть отрицательным.',
        ]);

        Setting::set('loan_period_days', $validatedData['loan_period_days']);
        Setting::set('fine_rate_per_day', $validatedData['fine_rate_per_day']);

        return redirect()->back()->with('success', 'Настройки успешно обновлены.');
    }
}