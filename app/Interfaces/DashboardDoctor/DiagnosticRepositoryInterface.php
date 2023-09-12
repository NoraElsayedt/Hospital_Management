<?php
namespace App\Interfaces\DashboardDoctor;


interface DiagnosticRepositoryInterface
{

   
    public function store($request);

     public function show($id);

     public function add_review($request);
}