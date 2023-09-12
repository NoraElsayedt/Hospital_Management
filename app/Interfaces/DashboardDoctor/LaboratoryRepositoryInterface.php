<?php
namespace App\Interfaces\DashboardDoctor;


interface LaboratoryRepositoryInterface
{


    public function store($request);

     public function update($request , $id);

    public function destroy($id);

    public function show($id);

}