<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Support\Facades\Log;

class ScheduleServiceProvider extends ServiceProvider
{
    public function boot(Schedule $schedule): void
    {
        // Example: Run a command daily
        $schedule->command('sanctum:prume-expired --hours=24')->daily();

        // Example: Run a closure every hour
        $schedule->call(function () {
            Log::info('Scheduled closure executed.');
        })->everyMinute();
    }
}
