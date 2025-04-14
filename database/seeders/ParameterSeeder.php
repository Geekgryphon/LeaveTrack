<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ParameterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 性別

        DB::table('parameters')->insert([
            'type' => 'Sex',
            'name' => 'Male',
            'description' => '男',
            'value' => '1',
            'sequence' => '1'
        ]);

        DB::table('parameters')->insert([
            'type' => 'Sex',
            'name' => 'FeMale',
            'description' => '女',
            'value' => '2',
            'sequence' => '2'
        ]);

        // 假別

        DB::table('parameters')->insert([
            'type' => 'Leavetype',
            'name' => 'Annual Leave',
            'description' => '特休',
            'value' => 'A',
            'sequence' => '1'
        ]);

        DB::table('parameters')->insert([
            'type' => 'Leavetype',
            'name' => 'Personal Leave',
            'description' => '事假',
            'value' => 'P',
            'sequence' => '2'
        ]);

        DB::table('parameters')->insert([
            'type' => 'Leavetype',
            'name' => 'Compensatory Leave',
            'description' => '補休',
            'value' => 'C',
            'sequence' => '3'
        ]);

        DB::table('parameters')->insert([
            'type' => 'Leavetype',
            'name' => 'Business Trip',
            'description' => '公差',
            'value' => 'B',
            'sequence' => '4'
        ]);

        DB::table('parameters')->insert([
            'type' => 'Leavetype',
            'name' => 'Overtime',
            'description' => '加班',
            'value' => 'O',
            'sequence' => '5'
        ]);

        // 職缺

        DB::table('parameters')->insert([
            'type' => 'Role',
            'name' => 'Frontend Developer',
            'description' => '前端',
            'value' => 'F',
            'sequence' => '1'
        ]);

        DB::table('parameters')->insert([
            'type' => 'Role',
            'name' => 'Backend Developer',
            'description' => '後端',
            'value' => 'B',
            'sequence' => '2'
        ]);

        DB::table('parameters')->insert([
            'type' => 'Role',
            'name' => 'QA Engineer',
            'description' => '測試',
            'value' => 'Q',
            'sequence' => '3'
        ]);

        DB::table('parameters')->insert([
            'type' => 'Role',
            'name' => 'Network Administrator',
            'description' => '網管',
            'value' => 'N',
            'sequence' => '4'
        ]);

        DB::table('parameters')->insert([
            'type' => 'Role',
            'name' => 'Product Manager',
            'description' => '組長',
            'value' => 'P',
            'sequence' => '5'
        ]);

        DB::table('parameters')->insert([
            'type' => 'Role',
            'name' => 'Department Head',
            'description' => '單位主任',
            'value' => 'D',
            'sequence' => '6'
        ]);

        // 部門
         
    }
}
