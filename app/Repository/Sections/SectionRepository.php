<?php
 namespace App\Repository\Sections;

 use App\Interfaces\Sections\SectionRepositoryInterface;
 use App\Models\Section;
 use App\Models\Doctor;
 use Illuminate\Support\Facades\DB;
 class SectionRepository implements SectionRepositoryInterface
 {
 
     public function index()
     {
        $section_All = Section::get();
        return view('Dashboard.Sections.index',compact('section_All'));
     }
   
       // Insert Sections
    public function store( $request){
        $add_Section =Section::create([
            'name'=>$request->input('name'),

            'description'=>$request->input('description'),
           
        ]);
        session()->flash('add');
        return redirect()->route('section.index');
    }


    public function update($request){

         $edit_Section = Section::find($request->id);
         $edit_Section->update([
            'name'=>$request->input('name'),
            'description'=>$request->input('description')
        ]);
        session()->flash('edit');
        return redirect()->route('section.index');
    }


    public function destroy($request){

        $delete_Section = Section::find($request->id)->delete();
       session()->flash('delete');
       return redirect()->route('section.index');
    }

    public function show($id){
        $sections =Section::find($id);

              $All_Doctor = Doctor::where('section_id','=',$id)->get();

             return view('Dashboard.Sections.show_doctors',compact('All_Doctor','sections'));


            
        

    }

    
}