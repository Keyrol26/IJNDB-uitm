<?php

namespace App\Console;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    /**
     * Register the commands for the application.
     *
     * @return void
     */
    // protected function schedulePin(Schedule $schedule)
    // {
    //     $schedule
    //         ->call(function () {
    //             $pass = DB::table("users")
    //                 ->where("id", "3")
    //                 ->get('password');
    //             $hashpass = Hash::make($pass);

    //             $data = User::findOrFail('3');
    //             $data->update('password',$hashpass)
    //                     ->update('updated_at',now());
    //         })
    //         ->everyMinute()->timezone('Asia/Singapore');
    // }
    protected function commands()
    {
        $this->load(__DIR__ . '/Commands');

        require base_path('routes/console.php');
    }


    
}
