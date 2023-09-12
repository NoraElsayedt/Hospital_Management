<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Relations\MorphMany;
use  App\Models\Image;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Rela;

class Ray extends Model
{
    use HasFactory;
    protected $guarded = [];
    
    public function Doctor()
    {
        return $this->belongsTo(Doctor::class,'doctor_id');
    }

    public function Patient()
    {
        return $this->belongsTo(Patient::class,'patient_id');
    }

    public function Ray_Employee()
    {
        return $this->belongsTo(Ray_Employee::class,'ray__employee_id');
    }


    public function images(): MorphMany
    {
        return $this->morphMany(Image::class, 'imageable');
    }


}
