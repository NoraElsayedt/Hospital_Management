<?php
namespace App\Interfaces\Ray_EmployeeDashboard;


interface IndexxRepositoryInterface
{

    // get All Doctors
    public function index(); 

    public function create();

    public function edit($id);

    public function show($id);
    public function update($request,$id);
    

}