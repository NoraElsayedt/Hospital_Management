<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;


class Patient extends Authenticatable
{
    use HasFactory;
    use Translatable;

    protected $fillable = [
        'email',
        'Date_Birth',
        'Phone',
        'Gender',
        'Blood_Group'
    ];

   // 3. To define which attributes needs to be translated
   public $translatedAttributes = ['name','Address'];
}
