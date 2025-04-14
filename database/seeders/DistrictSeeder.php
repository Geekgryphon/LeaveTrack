<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DistrictSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('districts')->insert([
            'city_id' => '10',
            'zipcode' => '540',
            'name' => '南投市',
            'seq' => '1'
        ]);

        DB::table('districts')->insert([
            'city_id' => '10',
            'zipcode' => '541',
            'name' => '中寮鄉',
            'seq' => '2'
        ]);

        DB::table('districts')->insert([
            'city_id' => '10',
            'zipcode' => '542',
            'name' => '草屯鎮',
            'seq' => '3'
        ]);

        DB::table('districts')->insert([
            'city_id' => '10',
            'zipcode' => '544',
            'name' => '國姓鄉',
            'seq' => '4'
        ]);

        DB::table('districts')->insert([
            'city_id' => '10',
            'zipcode' => '545',
            'name' => '埔里鎮',
            'seq' => '5'
        ]);

        DB::table('districts')->insert([
            'city_id' => '10',
            'zipcode' => '546',
            'name' => '仁愛鄉',
            'seq' => '6'
        ]);



        DB::table('districts')->insert([
            'city_id' => '11',
            'zipcode' => '630',
            'name' => '斗南鎮',
            'seq' => '1'
        ]);

        DB::table('districts')->insert([
            'city_id' => '11',
            'zipcode' => '631',
            'name' => '大埤鄉',
            'seq' => '2'
        ]);

        DB::table('districts')->insert([
            'city_id' => '11',
            'zipcode' => '632',
            'name' => '虎尾鎮',
            'seq' => '3'
        ]);

        DB::table('districts')->insert([
            'city_id' => '11',
            'zipcode' => '633',
            'name' => '土庫鎮',
            'seq' => '4'
        ]);

        DB::table('districts')->insert([
            'city_id' => '11',
            'zipcode' => '634',
            'name' => '褒忠鄉',
            'seq' => '5'
        ]);

        DB::table('districts')->insert([
            'city_id' => '11',
            'zipcode' => '635',
            'name' => '東勢鄉',
            'seq' => '6'
        ]);




        DB::table('districts')->insert([
            'city_id' => '18',
            'zipcode' => '970',
            'name' => '花蓮市',
            'seq' => '1'
        ]);

        DB::table('districts')->insert([
            'city_id' => '18',
            'zipcode' => '971',
            'name' => '新城鄉',
            'seq' => '2'
        ]);

        DB::table('districts')->insert([
            'city_id' => '18',
            'zipcode' => '972',
            'name' => '秀林鄉',
            'seq' => '3'
        ]);

        DB::table('districts')->insert([
            'city_id' => '18',
            'zipcode' => '973',
            'name' => '吉安鄉',
            'seq' => '4'
        ]);

        DB::table('districts')->insert([
            'city_id' => '18',
            'zipcode' => '974',
            'name' => '壽豐鄉',
            'seq' => '5'
        ]);

        DB::table('districts')->insert([
            'city_id' => '18',
            'zipcode' => '975',
            'name' => '鳳林鎮',
            'seq' => '6'
        ]);
    }
}
