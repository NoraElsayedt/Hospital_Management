<?php
 namespace App\Repository\Ray_EmployeeDashboard;

 use App\Interfaces\Ray_EmployeeDashboard\IndexxRepositoryInterface;
 use App\Models\Ray;
 use App\Models\Section;

 use App\Trait\UploadImage;
 use Illuminate\Support\Facades\DB;
 use Illuminate\Support\Facades\Hash;
 use Illuminate\Support\Facades\Auth;

 class IndexxRepository implements IndexxRepositoryInterface
 {
  use UploadImage;

     public function index() {
        $invoices = Ray::where('case',0)->get();
        return view('Dashboard.Ray_EmployeeDashboard.index',compact('invoices'));
     }

     public function create(){
        $invoices = Ray::where('case',1)->get();
        return view('Dashboard.Ray_EmployeeDashboard.completed_invoices',compact('invoices'));
     }
   
  
    public function show($id){

        $rays= Ray::find($id);

        // if($rays->ray__employee_id != auth()->user()->id){
        //     return redirect()->route('400');

        // }

        return view('Dashboard.Ray_EmployeeDashboard.patient_details',compact('rays'));

    }




    public function edit($id){

        $invoice = Ray::find($id);
       return view('Dashboard.Ray_EmployeeDashboard.add_diagnosis',compact('invoice'));
    }

    public function update($request , $id){
        DB::beginTransaction();
        try {

        $invoice = Ray::find($id);
        
        $invoice->description_employee = $request->description_employee;
        $invoice->case=1;
        $invoice->ray__employee_id= auth()->user()->id;
        $invoice->save();       

       if( $request->hasFile( 'photos' ) ) {

         foreach ($request->photos as $photo) {
             //Upload img
             $this->verifyAndStoreImageForeach($photo,'Rays','upload_image',$invoice->id,'App\Models\Ray');
         }

          }

                DB::commit();
                session()->flash('edit');
                return redirect()->route('rayemployee_invoice.index');
            }
            catch(\Exception $e){

                DB::rollback();
                return redirect()->back()->withErrors(['error' => $e->getMessage()]);
            }
    }


 }