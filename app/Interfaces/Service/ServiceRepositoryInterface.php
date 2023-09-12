<?php
namespace App\Interfaces\Service;


interface ServiceRepositoryInterface
{

    // get All Doctors
    public function index();

  

    // Insert Doctors
    public function store($request);

    public function edit($id);

    public function update($request);
    
    // //delete  Doctors
    public function destroy($request);

}