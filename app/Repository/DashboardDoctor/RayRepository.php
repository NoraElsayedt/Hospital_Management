<?php
 namespace App\Repository\DashboardDoctor;

 use App\Interfaces\DashboardDoctor\RayRepositoryInterface;
 use App\Models\Invoice;
 use App\Models\Section;
 use App\Models\Ray;
 use Illuminate\Support\Facades\DB;
 use Illuminate\Support\Facades\Hash;
 use Illuminate\Support\Facades\Auth;

 class RayRepository implements RayRepositoryInterface
 {
    
 
    public function store( $request){


        DB::beginTransaction();
     try {

        $add_Ray = new Ray();
     
        $add_Ray->patient_id = $request->patient_id;
        $add_Ray->doctor_id=$request->doctor_id;
        $add_Ray->invoice_id=$request->invoice_id;
        $add_Ray->description=$request->description;

        $add_Ray->save();

        DB::commit();
        session()->flash('add');
        return redirect()->route('Doctor_invoice.index');
      }
      catch(\Exception $e){

        DB::rollback();
        return redirect()->back()->withErrors(['error' => $e->getMessage()]);
    }
    }

    public function destroy($id){
        Ray::destroy($id);
            session()->flash('delete');
            return redirect()->route('Doctor_invoice.index');

       

    }

    public function edit($id){

        $patient_ray = Ray::find($id);
      
       return view('Dashboard.Doctor.invoices.edit_xray_conversion',compact('patient_ray'));
    
    }

    public function update($request,$id){
        DB::beginTransaction();
        try {

        $patient_ray = Ray::find($id);
        
        $patient_ray->description = $request->description;
        $patient_ray->save();       
        DB::commit();
        session()->flash('edit');
        return redirect()->route('Doctor_invoice.index');
         }
        catch(\Exception $e){

        DB::rollback();
        return redirect()->back()->withErrors(['error' => $e->getMessage()]);
       }
    }

    public function show($id){

        $rays= Ray::find($id);

        // if($rays->doctor_id  != auth()->user()->id){
        //     return redirect()->route('400');

        // }

        // return $rays->images;
       return view('Dashboard.Doctor.invoices.view_rays',compact('rays'));

    }
      
    
   
   
 }