<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Loan;
use App\Models\Setting;
use carbon\Carbon;

class CheckOverdueLoans extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'loans:check-overdue';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Проверяет просроченные выдачи и обновляет штраф';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('Запуск проверки просрочек');

        //Дата для отчета
        $now = Carbon::now();
        //
        $overdueLoans = Loan::whereNull('returned_at')
            ->where('due_at', '<' , $now)
            ->get();

        $fineRate = (float) Setting::get('fine_rate_per_day', 10); //Ставка штрафа из настроек

        $updatedCount = 0;

        foreach ($overdueLoans as $loan) {
            //Расчет кол-во дней просрочки * ставку
            $daysOverdue = $loan->due_at->diffInDays($now);
            $newFineAmount = $daysOverdue * $fineRate;

            //Обновление штрафа
            if ($loan->fine_amount != $newFineAmount) {
                $loan->update(['fine_amount' => $newFineAmount]);
                $this->info("Выдача ID {$loan->id}: штраф обновлён до {$newFineAmount} руб. ({$daysOverdue} дней просрочки)");
                $updatedCount++;
            }
        }
        if ($updatedCount === 0) {
            $this->info('Нет выдач с обновлённым штрафом.');
        } else {
            $this->info("Обновлено {$updatedCount} выдач(и) с штрафами.");
        }

        $this->info('Проверка завершена ');
    }
}
