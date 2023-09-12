<?php
namespace App\Interfaces\LaboratorieEmployee;


interface LaboratorieEmployeeInterface
{

   
    public function index();

    public function store($request);

     public function edit($id);

    public function update($request, $id);

    public function destroy($request,$id);

    
}