<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;
    protected $guarded=[]; 
      public function scopeNotificationcount( $query ,$username)
    {
        $query->where('user_id', $username )->where('reader_status',0);
    }

    

}
