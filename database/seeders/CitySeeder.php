<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('cities')->insert([
            'id' => '10',
            'name' => '南投縣',
            'seq' => '10'
        ]);

        DB::table('cities')->insert([
            'id' => '11',
            'name' => '雲林縣',
            'seq' => '11'
        ]);

        DB::table('cities')->insert([
            'id' => '18',
            'name' => '花蓮縣',
            'seq' => '18'
        ]);
    }
}
