<?php
namespace App\Interfaces\ReceiptAccount;


interface ReceiptAccountRepositoryInterface
{

    // get All Sections
    public function index();

     public function create();
// //     // Insert Sections
  public function store($request);

// //     // //update  Sections
   public function update($request);

// //     // //delete  Sections
      public function destroy($request);
    public function edit($id);
    public function show($id);
//
 }