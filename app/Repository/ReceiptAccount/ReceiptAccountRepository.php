<?php
 namespace App\Repository\ReceiptAccount;

 use App\Interfaces\ReceiptAccount\ReceiptAccountRepositoryInterface;
 use App\Models\Receiptaccount;
 use App\Models\Patient;
 use App\Models\Fundaccount;
 use App\Models\Patientaccount;
 use Illuminate\Support\Facades\DB;
 use Illuminate\Support\Facades\Hash;

 class ReceiptAccountRepository implements ReceiptAccountRepositoryInterface
 {
     public function index() {
        $receipts = Receiptaccount::get();
        return view('Dashboard.Receipt.index',compact('receipts'));

    }

     public function create(){
        $Patients=Patient::all();
       return view('Dashboard.Receipt.add',compact('Patients'));
     }
   
       // Insert Sections
    public function store( $request){

        DB::beginTransaction();
     try {

        $Receiptaccount = new Receiptaccount(); 
        $Receiptaccount->patient_id = $request->patient_id;
        $Receiptaccount->amount=$request->Debit;
        $Receiptaccount->description=$request->description;
        $Receiptaccount->date=date('Y-m-d');
        $Receiptaccount->save();
        // ------------------------------------

        $Fundaccount = new Fundaccount();
        $Fundaccount->receiptaccount_id =$Receiptaccount->id;
        $Fundaccount->invoice_date =date('Y-m-d');
        $Fundaccount->Debit = $request->Debit;
        $Fundaccount->credit= 0.00;
        $Fundaccount->save();
            // ---------------------------------------

            $Patientaccount =new Patientaccount;

            $Patientaccount->invoice_date =date('Y-m-d');
            $Patientaccount->receiptaccount_id =$Receiptaccount->id;
            $Patientaccount->Debit = 0.00;
            $Patientaccount->credit= $request->Debit;
            $Patientaccount->patient_id=$Receiptaccount->patient_id;
            $Patientaccount->save();
        DB::commit();
        session()->flash('add');
        return redirect()->route('ReceiptAccount.index');
    }
    catch(\Exception $e){

        DB::rollback();
        return redirect()->back()->withErrors(['error' => $e->getMessage()]);
    }
    }

    public function destroy($request){

            ReceiptAccount::destroy($request->id);
            session()->flash('delete');
            return redirect()->route('ReceiptAccount.index');
    }

    public function edit($id){

        $receipt_accounts = ReceiptAccount::find($id);
        $Patients =Patient::all( );

       return view('Dashboard.Receipt.edit',compact('receipt_accounts','Patients'));
    }

    public function show($id){
        $receipt = ReceiptAccount::find($id);
        
        return view('Dashboard.Receipt.print',compact('receipt'));
      

    }

    public function update($request){
        DB::beginTransaction();
        try {

            $Receiptaccount = ReceiptAccount::find($request->id);

        
        $Receiptaccount->amount=$request->Debit;
        $Receiptaccount->description=$request->description;
        $Receiptaccount->date=date('Y-m-d');
        $Receiptaccount->patient_id = $request->patient_id;
        $Receiptaccount->save();
        $Fundaccount = Fundaccount::where('receiptaccount_id',$request->id)->first();
        $Fundaccount->receiptaccount_id =$Receiptaccount->id;
        $Fundaccount->invoice_date =date('Y-m-d');
        $Fundaccount->Debit = $request->Debit;
        $Fundaccount->credit= 0.00;
        $Fundaccount->save();
            // ---------------------------------------

            $Patientaccount =Patientaccount::where('receiptaccount_id',$request->id)->first();

            $Patientaccount->invoice_date =date('Y-m-d');
            $Patientaccount->receiptaccount_id =$Receiptaccount->id;
            $Patientaccount->Debit = 0.00;
            $Patientaccount->credit= $request->Debit;
            $Patientaccount->patient_id=$Receiptaccount->patient_id;
            $Patientaccount->save();
  
        DB::commit();
        session()->flash('edit');
        return redirect()->route('ReceiptAccount.index');
    }
    catch(\Exception $e){

        DB::rollback();
        return redirect()->back()->withErrors(['error' => $e->getMessage()]);
    }
    }

 }