<?php

namespace App\Http\Livewire\Chat;
use App\Models\Conversation;
use App\Models\Doctor;
use App\Models\Patient;
use Illuminate\Support\Facades\Auth;

use Livewire\Component;

class Chatlist extends Component
{
    public $Conversations;

    public $auth_email;
    public $receiveruser;
    public $selected_Conversations;
    public function mount(){

        $this->auth_email=auth()->user()->email;
    }

     public function getusers(Conversation $Conversation ,$request){

        if($Conversation->sender_email ==  $this->auth_email){

            $this->receiveruser=Doctor::firstwhere('email',$Conversation->receiver_email);
        }
        else{
            $this->receiveruser=Patient::firstwhere('email',$Conversation->sender_email);
        }
        if (isset($request)) {
            return $this->receiveruser->$request;
          
        }
     }


     public function chatuserseleted(Conversation $Conversation , $receiver_id){
        // dd($receiver_id );
        $this->selected_Conversations=$Conversation;
        $this->receiveruser=Doctor::find($receiver_id);
        // dd( $this->receiveruser);
        if (Auth::guard('patient')->check()) {
           $this->emitTo('chat.chatbox','load_Conversation_Doctor', $this->selected_Conversations,$this->receiveruser);
          }
          else{
            $this->emitTo('chat.chatbox','load_Conversation_patient', $this->selected_Conversations,$this->receiveruser);
          }
     }

    public function render()
    {
        $this->Conversations=Conversation::where('sender_email',$this->auth_email)
        ->orwhere('receiver_email',$this->auth_email)
        ->orderBy('created_at','DESC')
        ->get();
        return view('livewire.chat.chatlist');
    }
}
