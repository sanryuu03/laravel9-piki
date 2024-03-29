<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Support\Facades\Log;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->call(function () {

            //Pengecekan apakah cronjob berhasil atau tidak
            //Mencatat info log
            Log::info('Cronjob berhasil dijalankan');
            Log::debug('Cronjob berhasil dijalankan');
        })->everyMinute();
        // $schedule->command('inspire')->hourly();
        // $schedule->command('command:perpindahanTempKeAnggota')->daily();
        $schedule->command('command:perpindahanTempKeAnggota')->everyMinute();
        // $schedule->command('command:perpindahanTempKeAnggota')->everyFiveMinutes()->timezone('Asia/Jakarta');
        // $schedule->command('artisan cache:clear')->everyFiveMinutes();
        // $schedule->command('artisan view:clear')->everyFiveMinutes();
        //Mencatat info log
        Log::info('Cronjob berhasil dijalankan');
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__ . '/Commands');

        require base_path('routes/console.php');
    }
}
