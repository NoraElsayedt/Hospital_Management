<?php
 namespace App\Repository\LaboratorieEmployee;

 use App\Interfaces\LaboratorieEmployee\IndexlabRepositoryInterface;
 use App\Models\Laboratory;

 use App\Trait\UploadImage;
 use Illuminate\Support\Facades\DB;
 use Illuminate\Support\Facades\Hash;
 use Illuminate\Support\Facades\Auth;

 class IndexlabRepository implements IndexlabRepositoryInterface
 {
  use UploadImage;

     public function index() {
        $invoices = Laboratory::where('case',0)->get();
        return view('Dashboard.dashboard_LaboratorieEmployee.index',compact('invoices'));
     }

     public function create(){
        $invoices = Laboratory::where('case',1)->get();
        return view('Dashboard.dashboard_LaboratorieEmployee.completed_invoices',compact('invoices'));
     }
   
  
    public function show($id){

        $laboratorie= Laboratory::find($id);

        // if($rays->ray__employee_id != auth()->user()->id){
        //     return redirect()->route('400');

        // }

        return view('Dashboard.dashboard_LaboratorieEmployee.patient_details',compact('laboratorie'));

    }




    public function edit($id){

        $invoice = Laboratory::find($id);
       return view('Dashboard.dashboard_LaboratorieEmployee.add_diagnosis',compact('invoice'));
    }

    public function update($request , $id){
        DB::beginTransaction();
        try {

        $invoice = Laboratory::find($id);
        
        $invoice->description_employee = $request->description_employee;
        $invoice->case=1;
        $invoice->laboratorie_employee_id= auth()->user()->id;
        $invoice->save();       

       if( $request->hasFile( 'photos' ) ) {

         foreach ($request->photos as $photo) {
             //Upload img
             $this->verifyAndStoreImageForeach($photo,'Laboratorys','upload_image',$invoice->id,'App\Models\Laboratory');
         }

          }

                DB::commit();
                session()->flash('edit');
                return redirect()->route('Labemployee_invoice.index');
            }
            catch(\Exception $e){

                DB::rollback();
                return redirect()->back()->withErrors(['error' => $e->getMessage()]);
            }
    }


 }