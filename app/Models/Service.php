<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;

class Service extends Model
{
    use HasFactory;
    use Translatable;


    protected $fillable = [
        'price',
        'description',
        'status'
    ];


     // 3. To define which attributes needs to be translated
   public $translatedAttributes = ['name'];
}
