<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Interfaces\DashboardDoctor\Ray_EmployeeRepositoryInterface;



class Ray_EmployeeController extends Controller
{
    
    private $Ray_Employee;
  
    public function __construct(Ray_EmployeeRepositoryInterface  $Ray_Employee)
    {
        $this->Ray_Employee =  $Ray_Employee;
    }


    public function index()
    {
        return $this->Ray_Employee->index();
    }

    
    public function store(Request $request)
    {
        return $this->Ray_Employee->store($request);
    }

    public function edit($id)
    {
        return $this->Ray_Employee->edit($id);

    }

    public function update(Request $request , $id)
    {
                return $this->Ray_Employee->update($request ,$id );

    }

    public function destroy($id)
    {
        return $this->Ray_Employee->destroy($id);

    }
}
