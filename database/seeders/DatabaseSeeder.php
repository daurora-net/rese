<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(ShopTableSeeder::class);
        $this->call(AreaTableSeeder::class);
        $this->call(GenreTableSeeder::class);
        $this->call(AdminTablesSeeder::class);
        $this->call(UserTableSeeder::class);
        $this->call(ReservationTableSeeder::class);
    }
}
