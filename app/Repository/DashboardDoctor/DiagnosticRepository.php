<?php
 namespace App\Repository\DashboardDoctor;

 use App\Interfaces\DashboardDoctor\DiagnosticRepositoryInterface;
 use App\Models\Diagnostic;
 use App\Models\Invoice;
 use App\Models\Patient;
 use App\Models\Ray;
 use App\Models\Laboratory;

 use Illuminate\Support\Facades\DB;
 use Illuminate\Support\Facades\Hash;
 use Illuminate\Support\Facades\Auth;
 

 class DiagnosticRepository implements DiagnosticRepositoryInterface
 {
    
 
    public function store( $request){

     DB::beginTransaction();
     try {
        //call function invoice_status
        $this->invoice_status($request->invoice_id , 3);

        $add_Diagnostic = new Diagnostic();
        $add_Diagnostic->patient_id = $request->patient_id;
        $add_Diagnostic->doctor_id=$request->doctor_id;
        $add_Diagnostic->invoice_id=$request->invoice_id;
        $add_Diagnostic->diagnosis=$request->diagnosis;
        $add_Diagnostic->medicine=$request->medicine;
        $add_Diagnostic->date=date('Y-m-d');
        $add_Diagnostic->save();
        DB::commit();
        session()->flash('add');
        return redirect()->back();
    }
    catch(\Exception $e){

        DB::rollback();
        return redirect()->back()->withErrors(['error' => $e->getMessage()]);
    }
    }




    public function show($id){
      $patient_records =Diagnostic::where('patient_id',$id)->get();
      $patient_rays =Ray::where('patient_id',$id)->get();
      $patient_Laboratories = Laboratory::where('patient_id',$id)->get();
      return view('Dashboard.Doctor.invoices.patient_details',compact('patient_Laboratories','patient_records','patient_rays'));      

  }


  public function add_review( $request){
    
    //call function invoice_status

    $this->invoice_status($request->invoice_id , 2);

   DB::beginTransaction();
   try {
      $add_Diagnostic = new Diagnostic();
      $add_Diagnostic->patient_id = $request->patient_id;
      $add_Diagnostic->doctor_id=$request->doctor_id;
      $add_Diagnostic->invoice_id=$request->invoice_id;
      $add_Diagnostic->diagnosis=$request->diagnosis;
      $add_Diagnostic->medicine=$request->medicine;
      $add_Diagnostic->review_date=$request->review_date;
      $add_Diagnostic->date=date('Y-m-d');
      $add_Diagnostic->save();
      DB::commit();
      session()->flash('add');
      return redirect()->back();
  }
  catch(\Exception $e){

      DB::rollback();
      return redirect()->back()->withErrors(['error' => $e->getMessage()]);
  }
  }

 

  public function invoice_status($invoice_id , $status){
  $invoice_status=Invoice::find($invoice_id);
  $invoice_status->update([
      'invoice_status' =>$status
  ]);
  }
   
 }
