<?php
namespace App\Interfaces\DashboardDoctor;


interface Ray_EmployeeRepositoryInterface
{

    // get All Doctors
    public function index();

    public function store($request);

     public function edit($id);

    public function update($request, $id);

    public function destroy($id);

    
}