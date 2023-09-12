<?php
namespace App\Interfaces\Sections;


interface SectionRepositoryInterface
{

    // get All Sections
    public function index();

    // Insert Sections
    public function store($request);

    //update  Sections
    public function update($request);

    //delete  Sections
    public function destroy($request);
    public function show($id);
}