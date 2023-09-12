<?php
namespace App\Interfaces\Ambulance;


interface AmbulanceRepositoryInterface
{

    // get All Sections
    public function index();

    public function create();
    // Insert Sections
    public function store($request);

    // //update  Sections
    public function update($request);

    // //delete  Sections
     public function destroy($request);
     public function edit($id);
}