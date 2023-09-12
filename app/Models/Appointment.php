<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Appointment extends Model
{
    use HasFactory;
    use Translatable;


    protected $fillable = [
        'name'
    ];
   public $translatedAttributes = ['name'];

   public function doctors(): BelongsToMany
   {
       return $this->belongsToMany(Doctor::class,'appointment_doctors');
   }




}
