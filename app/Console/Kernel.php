<?php
 
namespace App\Console;
 
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Support\Facades\DB;
 
class Kernel extends ConsoleKernel
{
    protected $commands=[

        Commands\TestCrom::class,
    ];
    protected function schedule(Schedule $schedule)
    {
       $schedule->command('test:cron')->everyMinute();
    }

    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}