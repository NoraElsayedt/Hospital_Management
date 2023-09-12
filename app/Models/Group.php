<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use  App\Models\Service;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Group extends Model
{
    use HasFactory;
    use Translatable;

    protected $fillable = [
        'Total_before_discount',
        'discount_value',
        'Total_after_discount',
        'tax_rate',
        'Total_with_tax'
    ];

   // 3. To define which attributes needs to be translated
   public $translatedAttributes = ['name','notes'];


   public function services(): BelongsToMany
   {
       return $this->belongsToMany(Service::class,'service_groups')->withPivot('quantity');
   }

}
