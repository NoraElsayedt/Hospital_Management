<?php
 namespace App\Repository\Patient;

 use App\Interfaces\Patient\PatientRepositoryInterface;
 use App\Models\Patient;
 use App\Models\Invoice ;
 use App\Models\Receiptaccount;
 use App\Models\Patientaccount;
 use Illuminate\Support\Facades\DB;

 class PatientRepository implements PatientRepositoryInterface
 {
     
    public function index() {
         $Patients = Patient::get();
       return view('Dashboard.Patient.index',compact('Patients'));
    }

    public function create(){
        return view('Dashboard.Patient.create');
    }
          // Insert Sections
    public function store( $request){

        DB::beginTransaction();
        try {
   
           $Patient = new Patient();
         
           
           $Patient->name = $request->name;
           $Patient->email=$request->email;
           $Patient->Date_Birth=$request->Date_Birth;
           $Patient->Phone=$request->Phone;
           $Patient->Gender=$request->Gender;
           $Patient->Blood_Group=$request->Blood_Group;
          
           
           
           $Patient->save();
   
           $Patient->name = $request->name;
           $Patient->Address=$request->Address;
           $Patient->save();
             DB::commit();
           session()->flash('add');
           return redirect()->route('Patient.index');
       }
       catch(\Exception $e){
   
           DB::rollback();
           return redirect()->back()->withErrors(['error' => $e->getMessage()]);
       }

    }

     public function destroy($request){
        Patient::destroy($request->id);
            session()->flash('delete');
            return redirect()->route('Patient.index');
    }
       
   public function edit($id){

        $Patient = Patient::find($id); 
       return view('Dashboard.Patient.edit',compact('Patient'));
    }


    public function show($id){
        $Patient = Patient::find($id);
        $invoices= Invoice::where('patient_id',$id)->get();
        $receipt_accounts =Receiptaccount::where('patient_id',$id)->get();
        $Patient_accounts =Patientaccount::where('patient_id',$id)->get();
        return view('Dashboard.Patient.show',compact('Patient','invoices','receipt_accounts','Patient_accounts'));
    }

    public function update($request){
        DB::beginTransaction();
        try {

      
        
        $Patient = Patient::find($request->id);
        
        $Patient->name = $request->name;
        $Patient->email=$request->email;
        $Patient->Date_Birth=$request->Date_Birth;
        $Patient->Phone=$request->Phone;
        $Patient->Gender=$request->Gender;
        $Patient->Blood_Group=$request->Blood_Group;
      
        
        $Patient->save();

        $Patient->name = $request->name;
        $Patient->Address=$request->Address;
        $Patient->save();             
         DB::commit();
         session()->flash('edit');
         return redirect()->route('Patient.index');
        }
    catch(\Exception $e){

        DB::rollback();
        return redirect()->back()->withErrors(['error' => $e->getMessage()]);
    }
    }
    
}