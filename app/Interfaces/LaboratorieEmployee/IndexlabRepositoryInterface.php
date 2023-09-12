<?php
namespace App\Interfaces\LaboratorieEmployee;


interface IndexlabRepositoryInterface
{

    // get All Doctors
    public function index(); 

    public function create();

    public function edit($id);

    public function show($id);
    public function update($request,$id);
    

}