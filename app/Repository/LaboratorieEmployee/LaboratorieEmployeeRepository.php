<?php
 namespace App\Repository\LaboratorieEmployee;

 use App\Interfaces\LaboratorieEmployee\LaboratorieEmployeeInterface;
 use App\Models\Doctor;
 use App\Models\Section;
 use App\Models\LaboratorieEmployee;
 use Illuminate\Support\Facades\DB;
 use Illuminate\Support\Facades\Hash;

 class LaboratorieEmployeeRepository implements LaboratorieEmployeeInterface
 {

 
     public function index() {
        $laboratorie_employees = LaboratorieEmployee::get();
        return view('Dashboard.laboratorie_employee.index',compact('laboratorie_employees'));
        
     }   
    
    public function store( $request){

        DB::beginTransaction();
         try {

        $LaboratorieEmployee = new LaboratorieEmployee();   
        $LaboratorieEmployee->name = $request->name;
        $LaboratorieEmployee->email=$request->email;
        $LaboratorieEmployee->password=Hash::make($request->password);
        $LaboratorieEmployee->save();
        DB::commit();
        session()->flash('add');
        return redirect()->back();
                  }
       catch(\Exception $e){

        DB::rollback();
        return redirect()->back()->withErrors(['error' => $e->getMessage()]);
         }
    }

    public function destroy($request,$id){  

        LaboratorieEmployee::destroy($id);
            session()->flash('delete');
            return redirect()->back();
    }

    public function edit($id){

        $laboratorie_employee = LaboratorieEmployee::find($id);       
       return view('Dashboard.laboratorie_employee.edit',compact('laboratorie_employee'));
    }

    public function update($request , $id){
        DB::beginTransaction();
        try {

        $laboratorie_employee = LaboratorieEmployee::find($id);
        
        $laboratorie_employee->name = $request->name;
        $laboratorie_employee->email=$request->email;
        $laboratorie_employee->password=Hash::make($request->password);
        $laboratorie_employee->save();                   
        DB::commit();
        session()->flash('edit');
        return redirect()->back();
    }
    catch(\Exception $e){

        DB::rollback();
        return redirect()->back()->withErrors(['error' => $e->getMessage()]);
    }
    }

 }