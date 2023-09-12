<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class Ray__employeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        {
            DB::table('ray__employees')->delete();
            DB::table('ray__employees')->insert([
                'name' => 'nora',
                'email' =>'nora@gmail.com',
                'password' => Hash::make('12345678'),
            ]);
        }
    }
}
