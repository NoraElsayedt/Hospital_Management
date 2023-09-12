<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Appointment;
use Illuminate\Support\Facades\DB;
class AppointmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('appointments')->delete();
        $Appointment =[
            ['name'=>' الاثنين	'],
            ['name'=>'الثلاثاء'],
           [ 'name'=>'الأربعاء'],
            ['name'=>' الخميس'],
            ['name'=>'الجمعة'],
            ['name'=>' السبت'],
            ['name'=>'الأحد'],
        ];
        foreach($Appointment as $Appointments){
            Appointment::create($Appointments);
    }
}
}
