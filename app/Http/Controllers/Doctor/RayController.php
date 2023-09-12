<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Interfaces\DashboardDoctor\RayRepositoryInterface;


class RayController extends Controller
{

    private $Ray;
  
    public function __construct(RayRepositoryInterface  $Ray)
    {
        $this->Ray =  $Ray;
    }
  
   
    public function store(Request $request)
    {
       return $this->Ray->store($request);
    }

    public function show($id)
    {
        return $this->Ray->show($id);
    }

    public function edit($id)
    {
        return $this->Ray->edit($id);
    }

    public function update(Request $request , $id)
    {
        return $this->Ray->update($request ,$id);
    }

   
    public function destroy($id)
    {
        return $this->Ray->destroy($id);

    }
}
