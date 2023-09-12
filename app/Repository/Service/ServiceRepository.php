<?php
 namespace App\Repository\Service;

 use App\Interfaces\Service\ServiceRepositoryInterface;
 use App\Models\Service;
 use Illuminate\Support\Facades\DB;
 use Illuminate\Support\Facades\Hash;

 class ServiceRepository implements ServiceRepositoryInterface
 {
    
 
     public function index() {
        $Service = Service::get();
        return view('Dashboard.Single_Service.index',compact('Service'));
     }

    
   
       // Insert Sections
    public function store( $request){

        DB::beginTransaction();
     try {

        $Service = new Service();
        
        $Service->name = $request->name;
        $Service->price=$request->price;
        $Service->description=$request->description;
        $Service->save();
            
        DB::commit();
        session()->flash('add');
        return redirect()->route('Service.index');
    }
    catch(\Exception $e){

        DB::rollback();
        return redirect()->back()->withErrors(['error' => $e->getMessage()]);
    }
    }

    
    
    public function destroy($request){

      Service::destroy($request->id);
            session()->flash('delete');
            return redirect()->route('Service.index');
        }
       

   
   

   public function edit($id){

        $Service = Service::find($id); 
       return view('Dashboard.Single_Service.edit',compact('Service'));
    }

    public function update($request){
        DB::beginTransaction();
        try {

         $Service = Service::find($request->id);
        
         $Service->name = $request->name;
         $Service->price=$request->price;
         $Service->description=$request->description;
         $Service->status=$request->status;
         $Service->save();
             
         DB::commit();
         session()->flash('edit');
         return redirect()->route('Service.index');
     }
    catch(\Exception $e){

        DB::rollback();
        return redirect()->back()->withErrors(['error' => $e->getMessage()]);
    }
    }

 }