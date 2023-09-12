<?php
namespace App\Interfaces\DashboardDoctor;


interface IndexRepositoryInterface
{

    // get All Doctors
    public function index();
    
    public function completed_invoices();
    public function review_invoices();

    // public function create();

    // // Insert Doctors
    // public function store($request);

    // public function edit($id);

    // public function update($request);
    
    // public function update_password( $request);
    // //delete  Doctors
    // public function destroy($request);

    // public function update_status($request);
}