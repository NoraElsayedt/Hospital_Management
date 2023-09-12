<?php
 namespace App\Repository\dashboard_patient;

 use App\Interfaces\dashboard_patient\Pat_invoRepositoryInterface;
 use App\Models\Ray;
 use App\Models\Invoice ;
 use App\Models\Laboratory;
 use App\Models\Patientaccount;
 use Illuminate\Support\Facades\DB;

 class Pat_invoRepository implements Pat_invoRepositoryInterface
 {
     
    public function getInvioc(){
        $invoices = Invoice::where('patient_id',auth()->user()->id)->get();
        return view('Dashboard.Patient_Dashboard.invoices',compact('invoices'));
    }

      
    public function getRay(){
        $rays = Ray::where('patient_id',auth()->user()->id)->get();
        return view('Dashboard.Patient_Dashboard.rays',compact('rays'));
    }
     
    public function getLab(){
        $laboratories = Laboratory::where('patient_id',auth()->user()->id)->get();
        return view('Dashboard.Patient_Dashboard.laboratories',compact('laboratories'));
    }
 
}