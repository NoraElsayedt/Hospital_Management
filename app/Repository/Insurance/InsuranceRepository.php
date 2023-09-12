<?php
 namespace App\Repository\Insurance;

 use App\Interfaces\Insurance\InsuranceRepositoryInterface;
 use App\Models\Insurance;
 use Illuminate\Support\Facades\DB;
 use Illuminate\Support\Facades\Hash;

 class InsuranceRepository implements InsuranceRepositoryInterface
 {
     
    public function index() {
        $Insurance = Insurance::get();
       return view('Dashboard.Insurance.index',compact('Insurance'));

    }

    public function create(){
        return view('Dashboard.Insurance.create');
    }
          // Insert Sections
    public function store( $request){

        DB::beginTransaction();
     try {

        $Insurance = new Insurance();
        
        $Insurance->insurance_code = $request->insurance_code;
        $Insurance->name=$request->name;
        $Insurance->discount_percentage=$request->discount_percentage;

        $Insurance->Company_rate=$request->Company_rate;
        $Insurance->notes=$request->notes;

        $Insurance->save();
            
        DB::commit();
        session()->flash('add');
        return redirect()->route('Insurance.index');
        }
      catch(\Exception $e){

        DB::rollback();
        return redirect()->back()->withErrors(['error' => $e->getMessage()]);
         }


    }

     public function destroy($request){
         Insurance::destroy($request->id);
            session()->flash('delete');
            return redirect()->route('Insurance.index');
    }
       
   public function edit($id){

        $insurances = Insurance::find($id); 
       return view('Dashboard.Insurance.edit',compact('insurances'));
    }

    public function update($request){
        DB::beginTransaction();
        try {

            if (!$request->has('status'))
            $request->request->add(['status' => 0]);
        else
            $request->request->add(['status' => 1]);
        
        $Insurance = Insurance::find($request->id);
         $Insurance->insurance_code = $request->insurance_code;
         $Insurance->name=$request->name;
         $Insurance->discount_percentage=$request->discount_percentage;
         $Insurance->Company_rate=$request->Company_rate;
         $Insurance->notes=$request->notes;
         $Insurance->status=$request->status;
        $Insurance->save();             
         DB::commit();
         session()->flash('edit');
         return redirect()->route('Insurance.index');
        }
    catch(\Exception $e){

        DB::rollback();
        return redirect()->back()->withErrors(['error' => $e->getMessage()]);
    }
    }
    
}