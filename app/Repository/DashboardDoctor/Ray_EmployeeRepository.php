<?php
 namespace App\Repository\DashboardDoctor;

 use App\Interfaces\DashboardDoctor\Ray_EmployeeRepositoryInterface;
 use App\Models\Doctor;
 use App\Models\Section;
 use App\Models\Ray_Employee;
 use Illuminate\Support\Facades\DB;
 use Illuminate\Support\Facades\Hash;

 class Ray_EmployeeRepository implements Ray_EmployeeRepositoryInterface
 {

 
     public function index() {
        $ray_employees = Ray_Employee::get();
        return view('Dashboard.ray_employee.index',compact('ray_employees'));
     }   
    
    public function store( $request){

        DB::beginTransaction();
         try {

        $Ray_Employee = new Ray_Employee();   
        $Ray_Employee->name = $request->name;
        $Ray_Employee->email=$request->email;
        $Ray_Employee->password=Hash::make($request->password);
        $Ray_Employee->save();
        DB::commit();
        session()->flash('add');
        return redirect()->back();
      }
       catch(\Exception $e){

        DB::rollback();
        return redirect()->back()->withErrors(['error' => $e->getMessage()]);
         }
    }

    public function destroy($id){  

        Ray_Employee::destroy($id);
            session()->flash('delete');
            return redirect()->back();
    }

    public function edit($id){

        $ray_employee = Ray_Employee::find($id);       
       return view('Dashboard.ray_employee.edit',compact('ray_employee'));
    }

    public function update($request , $id){
        DB::beginTransaction();
        try {

        $ray_employee = Ray_Employee::find($id);
        
        $ray_employee->name = $request->name;
        $ray_employee->email=$request->email;
        $ray_employee->password=Hash::make($request->password);
        $ray_employee->save();                   
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