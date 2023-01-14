<?php

namespace App\Console\Commands;

use App\Mail\Reminder;
use App\Models\Reservation;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;

class Batch extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'mail:batch';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '予約日当日の案内メールを送ります。';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $reservations = Reservation::whereDate('started_at', '=', Carbon::today())->get();
        foreach ($reservations as $reservation) {
            Mail::to($reservation->user->email)->send(new Reminder($reservation));
        }
    }
}
