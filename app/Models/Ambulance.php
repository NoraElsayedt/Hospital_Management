<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;

class Ambulance extends Model
{
    use HasFactory;


    use Translatable;

    protected $fillable = [
        'car_number',
        'car_model',
        'car_year_made',
        'driver_license_number',
        'driver_phone'
    ];

   // 3. To define which attributes needs to be translated
   public $translatedAttributes = ['driver_name','notes'];

  
}