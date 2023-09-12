<?php
 namespace App\Repository\Ambulance;

 use App\Interfaces\Ambulance\AmbulanceRepositoryInterface;
 use App\Models\Ambulance;
 use Illuminate\Support\Facades\DB;
 use Illuminate\Support\Facades\Hash;

 class AmbulanceRepository implements AmbulanceRepositoryInterface
 {
     
    public function index() {
        $Ambulance = Ambulance::get();
       return view('Dashboard.Ambulance.index',compact('Ambulance'));

    
    }

    public function create(){
        return view('Dashboard.Ambulance.create');
    }
          // Insert Sections
    public function store( $request){

        DB::beginTransaction();
        try {
   
           $Ambulance = new Ambulance();
         
           
           $Ambulance->car_number = $request->car_number;
           $Ambulance->car_model=$request->car_model;
           $Ambulance->car_year_made=$request->car_year_made;
           $Ambulance->car_type=$request->car_type;
           $Ambulance->driver_license_number=$request->driver_license_number;
           $Ambulance->driver_phone=$request->driver_phone;
           $Ambulance->is_available=1;
           
           $Ambulance->save();
   
           $Ambulance->driver_name=$request->driver_name;
           $Ambulance->notes=$request->notes;
           $Ambulance->save();
             DB::commit();
           session()->flash('add');
           return redirect()->route('Ambulance.index');
       }
       catch(\Exception $e){
   
           DB::rollback();
           return redirect()->back()->withErrors(['error' => $e->getMessage()]);
       }

    }

     public function destroy($request){
        Ambulance::destroy($request->id);
            session()->flash('delete');
            return redirect()->route('Ambulance.index');
    }
       
   public function edit($id){

        $ambulance = Ambulance::find($id); 
       return view('Dashboard.Ambulance.edit',compact('ambulance'));
    }

    public function update($request){
        DB::beginTransaction();
        try {

            if (!$request->has('is_available'))
            $request->request->add(['is_available' => 0]);
        else
            $request->request->add(['is_available' => 1]);
        
        $Ambulance = Ambulance::find($request->id);
        
        $Ambulance->car_number = $request->car_number;
        $Ambulance->car_model=$request->car_model;
        $Ambulance->car_year_made=$request->car_year_made;
        $Ambulance->car_type=$request->car_type;
        $Ambulance->driver_license_number=$request->driver_license_number;
        $Ambulance->driver_phone=$request->driver_phone;
        $Ambulance->is_available=1;
        $Ambulance->is_available=$request->is_available;
        
        $Ambulance->save();

        $Ambulance->driver_name=$request->driver_name;
        $Ambulance->notes=$request->notes;
        $Ambulance->save();             
         DB::commit();
         session()->flash('edit');
         return redirect()->route('Ambulance.index');
        }
    catch(\Exception $e){

        DB::rollback();
        return redirect()->back()->withErrors(['error' => $e->getMessage()]);
    }
    }
    
}