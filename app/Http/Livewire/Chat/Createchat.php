<?php

namespace App\Http\Livewire\Chat;
use Illuminate\Support\Facades\Auth;
use App\Models\Patient;
use App\Models\Doctor;
use App\Models\Message;
use App\Models\Conversation;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Createchat extends Component
{
    public $users;
    public $auth_email;
    public function mount(){
        $this->auth_email = auth()->user()->email;
    }

  

    public function createConversation($receiver_email){

     $check_createConversation =Conversation::Check_Conversation($this->auth_email,$receiver_email)->get();


     if($check_createConversation->isEmpty()){

        DB::beginTransaction();
        try{
           $Conversation= Conversation::create([
   
               'sender_email'=>$this->auth_email,
               'receiver_email'=>$receiver_email,
               'last_time_message'=>null
           ]);
   
           $Message =Message::create([
               'conversation_id'=>$Conversation->id,
               'sender_email'=>$this->auth_email,
               'receiver_email'=>$receiver_email,
               //'read'=>null,
               'body'=>'fff',
              // 'type'=>null
           ]);
   
           DB::commit();
   
        }
        catch(\Exception $e){
   
           DB::rollBack();
        }
     }
     else{

       dd("Conversation yes");
     }

       
    }

    public function render()
    {
        if(Auth::guard('patient')->check()){
            $this->users= Doctor::all();
        }
        else{
            $this->users= Patient::all();
        }
        // dd( $this->users);
        return view('livewire.chat.createchat')->extends('Dashboard.layouts.master');
    }
}
