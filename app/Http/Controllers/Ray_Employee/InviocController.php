<?php

namespace App\Http\Controllers\Ray_Employee;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Interfaces\Ray_EmployeeDashboard\IndexxRepositoryInterface;

class InviocController extends Controller
{
    private $invoice;
  
    public function __construct(IndexxRepositoryInterface  $invoice)
    {
        $this->invoice =  $invoice;
    }
 
    public function index()
    {
        return $this->invoice->index();
    }

   
    public function create()
    {
        return $this->invoice->create();
    }

  
    public function store(Request $request)
    {
        //
    }

   
    public function show($id)
    {
        return $this->invoice->show($id);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return $this->invoice->edit($id);
    }

    
    public function update(Request $request, $id)
    {
        return $this->invoice->update( $request ,$id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
