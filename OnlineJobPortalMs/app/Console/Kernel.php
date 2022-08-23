<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use App\Commands\DumpJobsTitleCommand;
use App\Commands\UpdatejobMLModelCommand;
use App\Commands\UpdateDataCommand;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        //
    ];

    /**
     * Define the application's command schedule.
     *
     * @param \Illuminate\Console\Scheduling\Schedule $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {

        // })->everyMinute();
        //->everyFifteenMinutes();
        //->everyFiveMinutes(); //->hourly(); //->twiceDaily(1, 13);

        $schedule->command('dump:jobtitles')->everyMinute()->onSuccess(function () {
            echo "Job Title Dumping completed...";
        })->onFailure(function () {
            echo "Job title dumping failed!. Retrying...";
        });


        $schedule->command('updated:data')->everyMinute()->onSuccess(function () {
            echo "Updated Data dumping completed...";
        })->onFailure(function () {
            echo "Updated Data dumping failed!. Retrying...";
        });

        $schedule->command('update:jobmodel')->everyMinute()->onSuccess(function () {
            echo "Job Model has been updated Successfully...";
        })->onFailure(function () {
            echo "Job Model Could not be updated. Retrying...";
        });

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
