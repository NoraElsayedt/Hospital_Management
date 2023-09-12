<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Interfaces\Service\ServiceRepositoryInterface;

class ServiceController extends Controller
{
   

    private $Service;
  
    public function __construct(ServiceRepositoryInterface $Service)
    {
        $this->Service = $Service;
    }


    public function index()
    {
        return $this->Service->index();
    }

  
    public function create()
    {
        //
    }
 
    public function store(Request $request)
    {

        return $this->Service->store( $request);
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        return $this->Service->edit($id);
    }

    public function update(Request $request)
    {
        return $this->Service->update( $request);
    }

    public function destroy(Request $request)
    {
        return $this->Service->destroy( $request);
    }
}
