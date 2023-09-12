<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Doctor;
use App\Models\Section;
use App\Interfaces\Doctor\DoctorRepositoryInterface;

class DoctorController extends Controller
{
 
    private $doctor;
  
    public function __construct(DoctorRepositoryInterface $doctor)
    {
        $this->doctor = $doctor;
    }



    public function index()
    {
    
        
       return $this->doctor->index();
    }
    public function create()
    {
        return $this->doctor->create();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return $this->doctor->store($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        return $this->doctor->edit($id);
    }

    public function update(Request $request)
    {
        return $this->doctor->update($request);
    }

  
    public function destroy(Request $request)
    {
        return $this->doctor->destroy($request);
    }

    public function update_password(Request $request){

        $this->validate($request, [
            'password' => 'required|min:6|confirmed',
            'password_confirmation' => 'required|min:6'
        ]);
        return $this->doctor->update_password($request);
       
    }

    public function update_status(Request $request){

        return $this->doctor->update_status($request);
    }
}
