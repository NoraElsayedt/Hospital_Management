<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use  App\Models\Image;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Doctor extends Authenticatable
{
    use HasFactory;
    use Translatable;

    protected $fillable = [
        'email',
        'email_verified_at',
        'password',
        'phone',
        
        'status',
        'name',
        'section_id'
    ];



     // 3. To define which attributes needs to be translated
   public $translatedAttributes = ['name'];


   public function image(): MorphOne
   {
       return $this->morphOne(Image::class, 'imageable');
   }


   public function appointments(): BelongsToMany
   {
       return $this->belongsToMany(Appointment::class,'appointment_doctors');
   }



public function section(){

    return $this->belongsTo(Section::class,'section_id');
}

}