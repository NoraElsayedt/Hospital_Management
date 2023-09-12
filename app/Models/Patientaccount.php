<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patientaccount extends Model
{
    use HasFactory;
    protected $guarded=[];

    public function invoice()
    {
        return $this->belongsTo(Invoice::class,'invoice_id');
    }

    public function ReceiptAccount()
    {
        return $this->belongsTo(ReceiptAccount::class,'receiptaccount_id');
    }
    public function PaymentAccount()
    {
        return $this->belongsTo(PaymentAccount::class,'paymentaccount_id');
    }
    
}
