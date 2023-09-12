<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Doctor;
use App\Models\Appointment;

class DoctorSeeder extends Seeder
{
    public function run()
    {
        $doctors= Doctor::factory()->count(10)->create();

               $Appointments = Appointment::all();
       Doctor::all()->each(function ($doctor) use ($Appointments) {
          $doctor->appointments()->attach(
             $Appointments->random(rand(1,7))
          );
      });
    }
}
