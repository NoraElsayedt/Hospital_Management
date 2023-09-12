<?php

namespace App\Http\Controllers\Laboratorie_Employee;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Interfaces\LaboratorieEmployee\IndexlabRepositoryInterface;

class Invioc_labController extends Controller
{
    private $invoice;
  
    public function __construct(IndexlabRepositoryInterface  $invoice)
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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
