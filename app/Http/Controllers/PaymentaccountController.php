<?php

namespace App\Http\Controllers;

use App\Models\Paymentaccount;
use Illuminate\Http\Request;


use App\Interfaces\ReceiptAccount\PaymentRepositoryInterface;


class PaymentaccountController extends Controller
{
    private $Payment;
  
    public function __construct(PaymentRepositoryInterface $Payment)
    {
        $this->Payment = $Payment;
    }
    public function index()
    {
        return $this->Payment->index();
    }

   
    public function create()
    {
        return $this->Payment->create();
    }

    public function store(Request $request)
    {
        return $this->Payment->store($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Paymentaccount  $paymentaccount
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return $this->Payment->show($id);
    }

    public function edit($id)
    {
        return $this->Payment->edit($id);
    }

    public function update(Request $request)
    {
        return $this->Payment->update($request);
    }


    public function destroy(Request $request)
    {
        return $this->Payment->destroy($request);
    }
}
