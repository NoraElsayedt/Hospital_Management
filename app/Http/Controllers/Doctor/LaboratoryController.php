<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Interfaces\DashboardDoctor\LaboratoryRepositoryInterface;

class LaboratoryController extends Controller
{
 
    private $Laboratory;
  
    public function __construct(LaboratoryRepositoryInterface  $Laboratory)
    {
        $this->Laboratory =  $Laboratory;
    }
  

    public function store(Request $request)
    {
        return $this->Laboratory->store($request);
    }

    public function show($id)
    {
        return $this->Laboratory->show($id);
    }
   
  
    public function update(Request $request, $id)
    {
        return $this->Laboratory->update($request ,$id);
    }

  
    public function destroy($id)
    {
        return $this->Laboratory->destroy($id);
    }
}
