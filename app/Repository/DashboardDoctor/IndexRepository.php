<?php
 namespace App\Repository\DashboardDoctor;

 use App\Interfaces\DashboardDoctor\IndexRepositoryInterface;
 use App\Models\Invoice;
 use App\Models\Section;
 use App\Models\Appointment;
 use Illuminate\Support\Facades\DB;
 use Illuminate\Support\Facades\Hash;
 use Illuminate\Support\Facades\Auth;

 class IndexRepository implements IndexRepositoryInterface
 {
    
 
     public function index() {
        $invoices = Invoice::where('doctor_id',(Auth::User()->id))->where('invoice_status',1)->get();
        return view('Dashboard.Doctor.invoices.index',compact('invoices'));

       
     }

     public function completed_invoices() {
      $invoices = Invoice::where('doctor_id',(Auth::User()->id))->where('invoice_status',3)->get();
      return view('Dashboard.Doctor.invoices.completed_invoices',compact('invoices'));

     
   }
   
 
   public function review_invoices() {
      $invoices = Invoice::where('doctor_id',(Auth::User()->id))->where('invoice_status',2)->get();
      return view('Dashboard.Doctor.invoices.review_invoices',compact('invoices'));

     
   }

   

    //  public function create(){
    //     $Section =Section::get();
    //     $Appointment =Appointment::get();
    //    return view('Dashboard.Doctors.add',compact('Section','Appointment'));
    //  }
   
    //    // Insert Sections
    // public function store( $request){

    //     DB::beginTransaction();
    //  try {

    //     $add_Doctor = new Doctor();
    //     $add_Appointment= new Appointment();
        
    //     $add_Doctor->name = $request->name;
    //     $add_Doctor->email=$request->email;
    //     $add_Doctor->password=Hash::make($request->password);
    //     $add_Doctor->section_id=$request->section_id;
    //     $add_Doctor->phone=$request->phone;
    //    // $add_Appointment->name=implode('.',$request->appointments);
    //     $add_Doctor->save();

    //     //pivot table
    //    $add_Doctor->appointments()->attach($request->appointments);
       
            
    //     $this->StoreImage( $request,'Doctors','upload_image','photo','App\Models\Doctor',$add_Doctor->id);

    //     // $add_Doctor->save();
            
    //     DB::commit();
    //     session()->flash('add');
    //     return redirect()->route('Doctor.index');
    // }
    // catch(\Exception $e){

    //     DB::rollback();
    //     return redirect()->back()->withErrors(['error' => $e->getMessage()]);
    // }
    // }

    // public function destroy($request){
    //     if($request->page == 1){
    //         if($request->filename){
    //             $this->destroyImage($request->id, 'upload_image','doctors/'.$request->filename);
    //         }

    //         Doctor::destroy($request->id);
    //         session()->flash('delete');
    //         return redirect()->route('Doctor.index');
    //     }
    //     else{
    //         $delete_select_id=explode(",", $request->delete_select_id);

    //         foreach($delete_select_id as $delete_select){
    //             $Doctor_All= Doctor::find($delete_select);
    //             if($Doctor_All->image){
    //             $this->destroyImage($delete_select, 'upload_image','doctors/'.$Doctor_All->image->filename);
    //         }
    //     }
    //         Doctor::destroy($delete_select_id);
    //         session()->flash('delete');
    //         return redirect()->route('Doctor.index');

    //     }

    // }

    // public function edit($id){

    //     $Doctor = Doctor::find($id);
    //     $Section =Section::all();
    //     $Appointment =Appointment::all();

        
    //    return view('Dashboard.Doctors.edit',compact('Doctor','Section','Appointment'));
    // }

    // public function update($request){
    //     DB::beginTransaction();
    //     try {

    //     $add_Doctor = Doctor::find($request->id);
        
    //     $add_Doctor->name = $request->name;
    //     $add_Doctor->email=$request->email;
    //     $add_Doctor->section_id=$request->section_id;
    //     $add_Doctor->phone=$request->phone;
    //     $add_Doctor->save();       
    //     $add_Doctor->appointments()->sync($request->appointments);


    //     if($request->photo){

    //         if($add_Doctor->image){
    //             $old_img = $add_Doctor->image->filename;
    //      $this->destroyImage($request->id, 'upload_image','doctors/'.$old_img);
    //     }
    //     $this->StoreImage( $request,'Doctors','upload_image','photo','App\Models\Doctor',$add_Doctor->id);

    //     }
    //     // $add_Doctor->save();
            
    //     DB::commit();
    //     session()->flash('edit');
    //     return redirect()->route('Doctor.index');
    // }
    // catch(\Exception $e){

    //     DB::rollback();
    //     return redirect()->back()->withErrors(['error' => $e->getMessage()]);
    // }
    // }

    // public function update_password($request){

      
    
    //    try{
    //     $Doctor=Doctor::find($request->id);
    //        $Doctor->update([
    //             'password'=>Hash::make($request->input('password'))
    //         ]);
    //          session()->flash('edit');
    //           return redirect()->route('Doctor.index');
    // }
    //     catch (\Exception $e) {
    //         return redirect()->back()->withErrors(['error' => $e->getMessage()]);
    //     }

    // }

    // public function update_status( $request){
    //     try{
    //         $Doctor=Doctor::find($request->id);
    //           if($request->status == 1){
    //             $Doctor->update([
    //                 'status'=>1
    //             ]);
    //           }
    //           else{
    //             $Doctor->update([
    //                 'status'=>0
    //             ]);
    //           }
    //              session()->flash('edit');
    //               return redirect()->route('Doctor.index');
    //     }
    //         catch (\Exception $e) {
    //             return redirect()->back()->withErrors(['error' => $e->getMessage()]);
    //         }
    // }
 }