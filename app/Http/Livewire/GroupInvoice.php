<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Group;
use App\Models\Invoice;
use App\Models\Patient;
use App\Models\Doctor;
use App\Models\Fundaccount;
use App\Models\Patientaccount;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class GroupInvoice extends Component
{
  public $showTable=true;
  public $InvoiceSaved;
  public $InvoiceUpdated;
  public $patient_id;
  public $doctor_id;
  public $section_id;
  public $group_id;
  public $type;
  public $price;
  public $updateMode=false;
  public $discount_value;
  public $tax_rate ;
  public $tax_value;
  public $subtotal;
  public $group_invoice_id;
  public $total_with_tax;



    public function render()
    {
        return view('livewire.GroupInvoice.group-invoice',[
            'groups' =>Group::all() ,
            'group_invoices' =>Invoice::where('invoice_type',2)->get() ,
            'patient'=>Patient::all(),
            'doctor'=>Doctor::all(),
               ]);
    }

    public function getsection(){
        $doctor_id = Doctor::where('id', $this->doctor_id)->first();
        $this->section_id = $doctor_id->section->name;
     
    }

    public function show_Table(){
        $this->showTable=false;
        }

    public function get_price(){
        $this->price =Group::where('id',$this->group_id)->first()->Total_before_discount;
        $this->discount_value = Group::where('id', $this->group_id)->first()->discount_value;
        $this->tax_rate = Group::where('id', $this->group_id)->first()->tax_rate;

        $Total_after_discount =((is_numeric($this->price) ? $this->price : 0)) - ((is_numeric($this->discount_value) ? $this->discount_value : 0));

       $this->tax_value  = $Total_after_discount;
   
        $this->subtotal=$Total_after_discount *((is_numeric($this->tax_rate) ? $this->tax_rate : 0) / 100);

       

        }




    public function store(){

       
       try{
        
        if($this->type ==1){

            $Group_invoice = new Invoice();
            $Group_invoice->patient_id = $this->patient_id;
            $Group_invoice->doctor_id =$this->doctor_id;
            $Group_invoice->section_id = DB::table('section_translations')->where('name', $this->section_id)->first()->section_id;
            $Group_invoice->invoice_type = 2;
            $Group_invoice->group_id =$this->group_id; 
            $Group_invoice->price =$this->price;
            $Group_invoice->discount_value =$this->discount_value;
            $Group_invoice->invoice_date = date('Y-m-d');
            $Group_invoice->invoice_status = 1;
            $Group_invoice->tax_rate =$this->tax_rate;
            $Group_invoice->tax_value= ($this->price -$this->discount_value) * ((is_numeric($this->tax_rate) ? $this->tax_rate : 0) / 100);
         $Group_invoice->total_with_tax=  $Group_invoice->price -  $Group_invoice->discount_value + $Group_invoice->tax_value;
         $Group_invoice->type= $this->type;

         $Group_invoice->save();

         $Fundaccount = new Fundaccount();
         $Fundaccount->invoice_id =$Group_invoice->id;
         $Fundaccount->invoice_date =date('Y-m-d');
         $Fundaccount->Debit = $Group_invoice->total_with_tax;
         $Fundaccount->credit= 0.00;
         $Fundaccount->save();
 
         $this->showTable=true;
         $this->InvoiceSaved =true;
         
        }
        else{


            $Group_invoice = new Invoice();
            $Group_invoice->patient_id = $this->patient_id;
            $Group_invoice->doctor_id =$this->doctor_id;
            $Group_invoice->section_id = DB::table('section_translations')->where('name', $this->section_id)->first()->section_id;
            $Group_invoice->invoice_type = 2;
            $Group_invoice->group_id =$this->group_id; 
            $Group_invoice->price =$this->price;
            $Group_invoice->discount_value =$this->discount_value;
            $Group_invoice->invoice_date = date('Y-m-d');
            $Group_invoice->invoice_status = 1;
            $Group_invoice->tax_rate =$this->tax_rate;
            $Group_invoice->tax_value= ($this->price -$this->discount_value) * ((is_numeric($this->tax_rate) ? $this->tax_rate : 0) / 100);
         $Group_invoice->total_with_tax=  $Group_invoice->price -  $Group_invoice->discount_value + $Group_invoice->tax_value;
         $Group_invoice->type= $this->type;

         $Group_invoice->save();

         $Patientaccount = new Patientaccount();
         $Patientaccount->invoice_id =$Group_invoice->id;
         $Patientaccount->invoice_date =date('Y-m-d');
         $Patientaccount->Debit = $Group_invoice->total_with_tax;
         $Patientaccount->credit= 0.00;
         $Patientaccount->patient_id = $Group_invoice->patient_id;
         $Patientaccount->save();
 
         $this->showTable=true;
         $this->InvoiceSaved =true;

}
}
catch (\Exception $e) {
    $this->catchError = $e->getMessage();
}

}


public function delete($id){
    $this->group_invoice_id =$id;

}

public function destroy(){

    Invoice::destroy($this->group_invoice_id);
    return redirect()->to('/GroupInvoice');
}

public function edit($id){
    $Group_invoice = Invoice::find($id);
    $this->group_invoice_id =$Group_invoice->id;
    $this->patient_id= $Group_invoice->patient_id;
    $this->doctor_id =$Group_invoice->doctor_id;
    $this->section_id=DB::table('section_translations')->where('id', $Group_invoice->section_id)->first()->name;    
    $this->group_id=$Group_invoice->group_id;
    $this->price= $Group_invoice->price;
    $this->discount_value=$Group_invoice->discount_value;
    $this->type=$Group_invoice->type;
    $this->tax_rate= $Group_invoice->tax_rate;
    $this->tax_value =$Group_invoice->tax_value ;
    $this->subtotal + $this->tax_value= $Group_invoice->total_with_tax;
       $this->updateMode =true;
       $this->showTable=false;


    
   }

   

   public function print($id){
    $Group_invoice = Invoice::find($id);


  return  Redirect::route('Print_group_invoices',[
    'invoice_date'=>$Group_invoice->invoice_date,
    'doctor_id'=>$Group_invoice->Doctor->name,
    'section_id'=>$Group_invoice->Section->name,
    'group_id'=>$Group_invoice->Group->name,
    'type'=>$Group_invoice->type,
    'price'=>$Group_invoice->price,
    'discount_value'=>$Group_invoice->discount_value,
    'tax_rate' => $Group_invoice->tax_rate,
    'total_with_tax' => $Group_invoice->total_with_tax,
    'total_with_tax' => $Group_invoice->total_with_tax,


  ]);
}



}