<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

class Ray_Employee extends Authenticatable
{
    use HasFactory;
     protected $guarded=[];
}
