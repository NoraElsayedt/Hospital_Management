<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class Laboratorie_EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        {
            DB::table('laboratorie_employees')->delete();
            DB::table('laboratorie_employees')->insert([
                'name' => 'nora_lab',
                'email' =>'nora_lab@gmail.com',
                'password' => Hash::make('12345678'),
            ]);
        }
    }
}
