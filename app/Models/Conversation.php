<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Conversation extends Model
{
    use HasFactory;
    protected $guarded=[];


    public function scopeCheck_Conversation( $query,$sender_email,$receiver_email)
    {
        $query->where('sender_email',$sender_email)->where('receiver_email',$receiver_email)->orwhere('receiver_email',$sender_email)->where('sender_email',$receiver_email);
    }

    
    public function messages():HasMany
    {
        return $this->hasMany(Message::class);
    }

}
