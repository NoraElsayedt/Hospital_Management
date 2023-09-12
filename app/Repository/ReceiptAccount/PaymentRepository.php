<?php
 namespace App\Repository\ReceiptAccount;

 use App\Interfaces\ReceiptAccount\PaymentRepositoryInterface;
 use App\Models\Paymentaccount;
 use App\Models\Patient;
 use App\Models\Fundaccount;
 use App\Models\Patientaccount;
 use Illuminate\Support\Facades\DB;
 use Illuminate\Support\Facades\Hash;

 class PaymentRepository implements PaymentRepositoryInterface
 {
     public function index() {
        $payments = Paymentaccount::get();
        return view('Dashboard.Payment.index',compact('payments'));
      

    }

     public function create(){
        $Patients=Patient::all();
       return view('Dashboard.Payment.add',compact('Patients'));
     }
   
       // Insert Sections
    public function store( $request){

        DB::beginTransaction();
     try {

        $Paymentaccount = new Paymentaccount(); 
        $Paymentaccount->patient_id = $request->patient_id;
        $Paymentaccount->amount=$request->credit;
        $Paymentaccount->description=$request->description;
        $Paymentaccount->date=date('Y-m-d');
        $Paymentaccount->save();
        // ------------------------------------

        $Fundaccount = new Fundaccount();
        $Fundaccount->Paymentaccount_id =$Paymentaccount->id;
        $Fundaccount->invoice_date =date('Y-m-d');
        $Fundaccount->Debit = 0.00;
        $Fundaccount->credit=  $request->credit;
        $Fundaccount->save();
            // ---------------------------------------

            $Patientaccount =new Patientaccount;

            $Patientaccount->invoice_date =date('Y-m-d');
            $Patientaccount->Paymentaccount_id =$Paymentaccount->id;
            $Patientaccount->Debit =  $request->credit; 
            $Patientaccount->credit= 0.00;
            $Patientaccount->patient_id=$Paymentaccount->patient_id;
            $Patientaccount->save();
        DB::commit();
        session()->flash('add');
        return redirect()->route('Payment.index');
    }
    catch(\Exception $e){

        DB::rollback();
        return redirect()->back()->withErrors(['error' => $e->getMessage()]);
    }
    }

    public function destroy($request){

        Paymentaccount::destroy($request->id);
            session()->flash('delete');
            return redirect()->route('Payment.index');
    }

    public function edit($id){

        $payment_accounts = Paymentaccount::find($id);
        $Patients =Patient::all( );

       return view('Dashboard.Payment.edit',compact('payment_accounts','Patients'));
    }


    public function show($id){
        $payment_account = Paymentaccount::find($id);
        
        return view('Dashboard.Payment.print',compact('payment_account'));
      

    }

    public function update($request){
        DB::beginTransaction();
        try {

            $Paymentaccount = Paymentaccount::find($request->id);
        
            $Paymentaccount->patient_id = $request->patient_id;
            $Paymentaccount->amount=$request->credit;
            $Paymentaccount->description=$request->description;
            $Paymentaccount->date=date('Y-m-d');
            $Paymentaccount->save();


        $Fundaccount = Fundaccount::where('paymentaccount_id',$request->id)->first();
        $Fundaccount->paymentaccount_id =$Paymentaccount->id;
        $Fundaccount->invoice_date =date('Y-m-d');
        $Fundaccount->Debit = 0.00;
        $Fundaccount->credit=  $request->credit;
        $Fundaccount->save();
            // ---------------------------------------

            $Patientaccount =Patientaccount::where('paymentaccount_id',$request->id)->first();

            $Patientaccount->invoice_date =date('Y-m-d');
            $Patientaccount->paymentaccount_id = $Paymentaccount->id;
            $Patientaccount->Debit =  $request->credit; 
            $Patientaccount->credit= 0.00;
            $Patientaccount->patient_id=$Paymentaccount->patient_id;
            $Patientaccount->save();


        DB::commit();
        session()->flash('edit');
        return redirect()->route('Payment.index');
    }
    catch(\Exception $e){

        DB::rollback();
        return redirect()->back()->withErrors(['error' => $e->getMessage()]);
    }
    }

 }