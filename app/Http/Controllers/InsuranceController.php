<?php

namespace App\Http\Controllers;

use App\Models\Insurance;
use Illuminate\Http\Request;
use App\Interfaces\Insurance\InsuranceRepositoryInterface;

class InsuranceController extends Controller
{

    private $Insurance;

    public function __construct(InsuranceRepositoryInterface $Insurance)
    {
        $this->Insurance = $Insurance;
    }
    

    public function index()
    {
        return $this->Insurance->index();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return $this->Insurance->create();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return $this->Insurance->store( $request);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Insurance  $insurance
     * @return \Illuminate\Http\Response
     */
    public function show(Insurance $insurance)
    {
        //
    }

    public function edit($id)
    {
    
        return $this->Insurance->edit($id);
    }

    public function update(Request $request)
    {
        return $this->Insurance->update( $request);
    }

 
    
    public function destroy(Request $request)
    {
        return $this->Insurance->destroy($request);
    }
}
