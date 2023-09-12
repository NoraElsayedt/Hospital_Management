<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Interfaces\LaboratorieEmployee\LaboratorieEmployeeInterface;

class LaboratorieEmployeeController extends Controller
{
    private $Laboratorie_Employee;
  
    public function __construct(LaboratorieEmployeeInterface  $Laboratorie_Employee)
    {
        $this->Laboratorie_Employee =  $Laboratorie_Employee;
    }
    public function index()
    {
        return $this->Laboratorie_Employee->index();
    }

  
    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        return $this->Laboratorie_Employee->store($request);
    }

    public function show($id)
    {
        //
    }

   
    public function edit($id)
    {
        return $this->Laboratorie_Employee->edit($id);
    }

    
    public function update(Request $request, $id)
    {
        return $this->Laboratorie_Employee->update($request,$id);
 
    }

   
    public function destroy(Request $request,$id)
    {
        return $this->Laboratorie_Employee->destroy($request,$id);
    }
}
