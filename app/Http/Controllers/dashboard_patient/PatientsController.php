<?php

namespace App\Http\Controllers\dashboard_patient;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Interfaces\dashboard_patient\Pat_invoRepositoryInterface;

class PatientsController extends Controller
{
    private $invoice;
  
    public function __construct(Pat_invoRepositoryInterface  $invoice)
    {
        $this->invoice =  $invoice;
    }

    public function getInvioc(){
        
        return $this->invoice->getInvioc();
    }

    public function getRay(){
        return $this->invoice->getRay();
    }
    public function getLab(){
        return $this->invoice->getLab();

    }
 
}
