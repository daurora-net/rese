<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GenreTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('genres')->insert([
            ['id' => 1, 'name' => '寿司'],
            ['id' => 2, 'name' => '焼肉'],
            ['id' => 3, 'name' => '居酒屋'],
            ['id' => 4, 'name' => 'イタリアン'],
            ['id' => 5, 'name' => 'ラーメン'],
        ]);
    }
}