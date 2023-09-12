<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Interfaces\DashboardDoctor\DiagnosticRepositoryInterface;


class DiagnosticController extends Controller
{
    private $Diagnostic;
  
    public function __construct(DiagnosticRepositoryInterface  $Diagnostic)
    {
        $this->Diagnostic =  $Diagnostic;
    }

    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        return $this->Diagnostic->store($request);
    }

    public function show($id)
    {
        return $this->Diagnostic->show($id);
    }



    public function add_review(Request $request)
    {
        return $this->Diagnostic->add_review($request);
    }

  

    public function edit($id)
    {
        //
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
        //
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
