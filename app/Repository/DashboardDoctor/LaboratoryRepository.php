<?php
 namespace App\Repository\DashboardDoctor;

 use App\Interfaces\DashboardDoctor\LaboratoryRepositoryInterface;
 use App\Models\Invoice;
 use App\Models\Laboratory;
 use App\Models\Ray;
 use Illuminate\Support\Facades\DB;
 use Illuminate\Support\Facades\Hash;
 use Illuminate\Support\Facades\Auth;

 class LaboratoryRepository implements LaboratoryRepositoryInterface
 {
    public function show($id){

        $laboratorie= Laboratory::find($id);

        // if($rays->doctor_id  != auth()->user()->id){
        //     return redirect()->route('400');

        // }

        // return $rays->images;
       return view('Dashboard.Doctor.invoices.show_lab',compact('laboratorie'));

    }
 
    public function store( $request){


        DB::beginTransaction();
     try {

        $add_Laboratory = new Laboratory();
     
        $add_Laboratory->patient_id = $request->patient_id;
        $add_Laboratory->doctor_id=$request->doctor_id;
        $add_Laboratory->invoice_id=$request->invoice_id;
        $add_Laboratory->description=$request->description;

        $add_Laboratory->save();

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
        Laboratory::destroy($id);
            session()->flash('delete');
            return redirect()->route('Doctor_invoice.index');

       

    }

 

    public function update($request,$id){
        DB::beginTransaction();
        try {

        $patient_Laboratory = Laboratory::find($id);
        
        $patient_Laboratory->description = $request->description;
        $patient_Laboratory->save();       
        DB::commit();
        session()->flash('edit');
        return redirect()->route('Doctor_invoice.index');
         }
        catch(\Exception $e){

        DB::rollback();
        return redirect()->back()->withErrors(['error' => $e->getMessage()]);
       }
    }


      
    
   
   
 }