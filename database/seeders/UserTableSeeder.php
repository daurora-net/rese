<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'id' => '1',
                'name' => 'テストユーザー',
                'email' => 'test@example.com',
                'email_verified_at' => Carbon::now(),
                'password' => 'test123456789',
            ],
        ]);
    }
}
