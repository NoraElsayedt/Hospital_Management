<?php
namespace App\Interfaces\DashboardDoctor;


interface RayRepositoryInterface
{


    public function store($request);

    public function edit($id);
     public function update($request , $id);

     public function show($id);
    public function destroy($id);

}