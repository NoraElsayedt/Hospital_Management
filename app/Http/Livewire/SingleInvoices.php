<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Invoice ;
use App\Models\Patient;
use App\Models\Doctor;
use App\Models\Service;
use App\Models\Fundaccount;
use App\Models\Patientaccount;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;



class SingleInvoices extends Component
{

    public $InvoiceSaved;
    public $InvoiceUpdated;
    public $patient_id;
    public $doctor_id;
    public $section_id;
    public $type;
    public $Service_id;
    public $price;
    public $discount_value = 0;
    public $tax_rate = 15;
    public $tax_value;
    public $subtotal;
    public $single_invoice_id ;
 public $updateMode =false ;

    // ----------------------------- function click button(To Show table)
public $show_table=true;

    public function show_table(){
        $this->show_table=false;

    }
// --------------------------------------------------   end function click button

    public function render()
    {
        return view('livewire.single-invoices.single-invoices',[

            // ------ show  Data in single_invoice Table
           'singleInvoices'=>Invoice::where('invoice_type',1)->get() , 

          'Patient' =>Patient::get(),  // ------ show  Data in Patient Table
          'Doctor' =>Doctor::get(),   // ------ show  Data in Doctor Table
          'Service' =>Service::get(),   // ------ show  Data in Doctor Table
        ]);
    }
//------------------------------------ function change doctor to get section 
    public function get_Section(){
        $doctor_id = Doctor::where('id',$this->doctor_id)->first();
        
        $this->section_id = $doctor_id->section->name; //relation section 

    }
//  ------------------------------------------ end  function change

//  ----------------------------  function  get_Price 
public function get_Price(){
    $Service_id = Service::where('id',$this->Service_id)->first(); 
     $this->price =$Service_id->price; 
} 
//     change discountvalue

public function get_Discountvalue(){
     $Total_after_discount =  ((is_numeric($this->price) ? $this->price : 0)) - ((is_numeric($this->discount_value) ? $this->discount_value : 0));

     $this->subtotal =$Total_after_discount; 
   $this->tax_value = $Total_after_discount *((is_numeric($this->tax_rate) ? $this->tax_rate : 0) / 100);
  

}
//  store 

public function store(){

    // inssert into invoice && box
if($this->type == 1){


 if($this->updateMode){

            $Single_Invoice =  Invoice::find( $this->single_invoice_id);
            $Single_Invoice->patient_id = $this->patient_id;
        $Single_Invoice->doctor_id=$this->doctor_id;
        $Single_Invoice->section_id= DB::table('section_translations')->where('name', $this->section_id)->first()->section_id;   
        $Single_Invoice->Service_id=$this->Service_id;
        $Single_Invoice->invoice_type = 1;
        $Single_Invoice->invoice_date = date('Y-m-d');
        $Single_Invoice->invoice_status = 1;
       $Single_Invoice->price=$this->price;
        $Single_Invoice->discount_value=$this->discount_value;
        $Single_Invoice->tax_rate=$this->tax_rate;
         $Single_Invoice->tax_value= ($this->price -$this->discount_value) * ((is_numeric($this->tax_rate) ? $this->tax_rate : 0) / 100);
         $Single_Invoice->total_with_tax=  $Single_Invoice->price -  $Single_Invoice->discount_value + $Single_Invoice->tax_value;
         $Single_Invoice->type= $this->type;
 
     $Single_Invoice->save();
    //  ------------------------------


    $Fundaccount = Fundaccount::where('invoice_id',$this->single_invoice_id)->first();

    $Fundaccount->invoice_id =$Single_Invoice->id;
    $Fundaccount->invoice_date =date('Y-m-d');
    $Fundaccount->Debit = $Single_Invoice->total_with_tax;
    $Fundaccount->credit= 0.00;
    $Fundaccount->save();

    $this->show_table=true;
    $this->InvoiceUpdated=true;


        }
   else{


        $Single_Invoice = new Invoice();       
        $Single_Invoice->patient_id = $this->patient_id;
        $Single_Invoice->doctor_id=$this->doctor_id;
        $Single_Invoice->section_id= DB::table('section_translations')->where('name', $this->section_id)->first()->section_id;   
        $Single_Invoice->Service_id=$this->Service_id;
        $Single_Invoice->invoice_type = 1;
        $Single_Invoice->invoice_date = date('Y-m-d');
        $Single_Invoice->invoice_status = 1;
       $Single_Invoice->price=$this->price;
        $Single_Invoice->discount_value=$this->discount_value;
        $Single_Invoice->tax_rate=$this->tax_rate;
         $Single_Invoice->tax_value= ($this->price -$this->discount_value) * ((is_numeric($this->tax_rate) ? $this->tax_rate : 0) / 100);
         $Single_Invoice->total_with_tax=  $Single_Invoice->price -  $Single_Invoice->discount_value + $Single_Invoice->tax_value;
         $Single_Invoice->type= $this->type;
 
         $Single_Invoice->save();
    
        $Fundaccount = new Fundaccount();
        $Fundaccount->invoice_id =$Single_Invoice->id;
        $Fundaccount->invoice_date =date('Y-m-d');
        $Fundaccount->Debit = $Single_Invoice->total_with_tax;
        $Fundaccount->credit= 0.00;
        $Fundaccount->save();

        $this->show_table=true;
        
    }
}

    // inssert into invoice && patient
 else{

    if($this->updateMode){
            $Single_Invoice =  Invoice::find( $this->single_invoice_id);
            $Single_Invoice->patient_id = $this->patient_id;
        $Single_Invoice->doctor_id=$this->doctor_id;
        $Single_Invoice->section_id= DB::table('section_translations')->where('name', $this->section_id)->first()->section_id;   
        $Single_Invoice->Service_id=$this->Service_id;
        $Single_Invoice->invoice_type = 1;
        $Single_Invoice->invoice_date = date('Y-m-d');
        $Single_Invoice->invoice_status = 1;
       $Single_Invoice->price=$this->price;
        $Single_Invoice->discount_value=$this->discount_value;
        $Single_Invoice->tax_rate=$this->tax_rate;
         $Single_Invoice->tax_value= ($this->price -$this->discount_value) * ((is_numeric($this->tax_rate) ? $this->tax_rate : 0) / 100);
         $Single_Invoice->total_with_tax=  $Single_Invoice->price -  $Single_Invoice->discount_value + $Single_Invoice->tax_value;
         $Single_Invoice->type= $this->type;
 
     $Single_Invoice->save();
    //  ------------------------------
       $Patientaccount =  Patientaccount::where('invoice_id',$this->single_invoice_id)->first();

    $Patientaccount->invoice_date =date('Y-m-d');
    $Patientaccount->invoice_id=$Single_Invoice->id;
    $Patientaccount->Debit = $Single_Invoice->total_with_tax;
    $Patientaccount->credit= 0.00;
    $Patientaccount->patient_id=$Single_Invoice->patient_id;
    $Patientaccount->save();

    $this->show_table=true;
    $this->InvoiceUpdated=true;

        }
else{
        $Single_Invoice = new Invoice();       
        $Single_Invoice->patient_id = $this->patient_id;
        $Single_Invoice->doctor_id=$this->doctor_id;
        $Single_Invoice->section_id= DB::table('section_translations')->where('name', $this->section_id)->first()->section_id;   
        $Single_Invoice->Service_id=$this->Service_id;
        $Single_Invoice->invoice_type = 1;
        $Single_Invoice->invoice_date = date('Y-m-d');
        $Single_Invoice->invoice_status = 1;
       $Single_Invoice->price=$this->price;
        $Single_Invoice->discount_value=$this->discount_value;
        $Single_Invoice->tax_rate=$this->tax_rate;
         $Single_Invoice->tax_value= ($this->price -$this->discount_value) * ((is_numeric($this->tax_rate) ? $this->tax_rate : 0) / 100);
         $Single_Invoice->total_with_tax=  $Single_Invoice->price -  $Single_Invoice->discount_value + $Single_Invoice->tax_value;
         $Single_Invoice->type= $this->type;
 
     $Single_Invoice->save();
    //  ----------------------------------------------
 
    $Patientaccount =new Patientaccount;

    $Patientaccount->invoice_date =date('Y-m-d');
    $Patientaccount->invoice_id=$Single_Invoice->id;
    $Patientaccount->Debit = $Single_Invoice->total_with_tax;
    $Patientaccount->credit= 0.00;
    $Patientaccount->patient_id=$Single_Invoice->patient_id;
    $Patientaccount->save();

    $this->show_table=true;
    $this->InvoiceUpdated=true;
    }

    }
      
           
  

}
// find id in single_invoice_id
public function delete($id){

    $this->single_invoice_id =$id;

}
public function destroy(){
    Invoice::destroy($this->single_invoice_id);
    return redirect()->to('/single-invoices');

}


//-----------------------------------

public function edit($id){
 $Single_Invoice = Invoice::find($id);
 $this->single_invoice_id =$Single_Invoice->id;
 $this->patient_id= $Single_Invoice->patient_id;
 $this->doctor_id =$Single_Invoice->doctor_id;
 $this->section_id=DB::table('section_translations')->where('id', $Single_Invoice->section_id)->first()->name;    
 $this->Service_id=$Single_Invoice->Service_id;
 $this->price= $Single_Invoice->price;
 $this->discount_value=$Single_Invoice->discount_value;
 $this->type=$Single_Invoice->type;

    $this->updateMode =true;
    $this->show_table=false;
}

public function print($id){
    $Single_Invoice = Invoice::find($id);


  return  Redirect::route('Print_single_invoices',[
    'invoice_date'=>$Single_Invoice->invoice_date,
    'doctor_id'=>$Single_Invoice->Doctor->name,
    'section_id'=>$Single_Invoice->Section->name,
    'Service_id'=>$Single_Invoice->Service->name,
    'type'=>$Single_Invoice->type,
    'price'=>$Single_Invoice->price,
    'discount_value'=>$Single_Invoice->discount_value,
    'tax_rate' => $Single_Invoice->tax_rate,
    'total_with_tax' => $Single_Invoice->total_with_tax,
    'total_with_tax' => $Single_Invoice->total_with_tax,


  ]);
}

}





