<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;

class Insurance extends Model
{
    use HasFactory;

    use Translatable;

    protected $fillable = [
        'insurance_code',
        'discount_percentage',
        'Company_rate',
        'status'
    ];

   // 3. To define which attributes needs to be translated
   public $translatedAttributes = ['name','notes'];
}
