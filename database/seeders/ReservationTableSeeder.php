<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ReservationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('reservations')->insert([
            [
                'id' => '1',
                'user_id' => '1',
                'shop_id' => '1',
                'started_at' => Carbon::now(),
                'num_of_users' => '2',
            ],
        ]);
    }
}
