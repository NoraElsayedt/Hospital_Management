<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Interfaces\ReceiptAccount\ReceiptAccountRepositoryInterface;

class ReceiptAccountController extends Controller
{
    private $ReceiptAccount;
  
    public function __construct(ReceiptAccountRepositoryInterface $ReceiptAccount)
    {
        $this->ReceiptAccount = $ReceiptAccount;
    }
 
    public function index()
    {
        return $this->ReceiptAccount->index();
    }

   
    public function create()
    {
        return $this->ReceiptAccount->create();
    }

   
    public function store(Request $request)
    {
        return $this->ReceiptAccount->store($request);
    }

  
    public function show($id)
    {
        return $this->ReceiptAccount->show($id);
    }

   
    public function edit($id)
    {
        return $this->ReceiptAccount->edit($id);
    }


    public function update(Request $request)
    {
        return $this->ReceiptAccount->update($request);
    }

    public function destroy(Request $request)
    {
        return $this->ReceiptAccount->destroy($request);
    }
}
