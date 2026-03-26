<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Courrier;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;

class SendReminders extends Command
{
    protected $signature = 'reminders:send';
    protected $description = 'Send reminders for courriers due in 5 days';

public function handle()
{
    $target = Carbon::today()->addDays(5)->toDateString();
    

    $courriers = Courrier::where('limite_recu', $target)
        ->where('reminder_sent', false)
        ->where('status', 'pending')
        ->get();

    foreach ($courriers as $courrier) {
        $date = Carbon::parse($courrier->limite_recu)->format('Y-m-d');
        $nGarde = "\u{200E}{$courrier->n_garde}";

        Mail::raw(
            "تنبيه: المراسلة رقم {$nGarde} موضوعها: {$courrier->sujet} — أجل الرد هو {$date}",
            function ($message) {
                $message->to(env('MAIL_TO'))
                        ->subject('⚠️ تنبيه: مراسلة تقترب من أجلها');
            }
        );

        $courrier->update(['reminder_sent' => true]);
        $this->info("Reminder sent for: {$courrier->n_garde}");
    }

    $this->info('Done!');
}
}