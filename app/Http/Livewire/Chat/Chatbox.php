<?php

namespace App\Http\Livewire\Chat;
use App\Models\Conversation;
use App\Models\Doctor;
use App\Models\Message;
use App\Models\Patient;
use Livewire\Component;

class Chatbox extends Component
{
    protected $listeners=['load_Conversation_Doctor','load_Conversation_patient'];
    public $receiver;
    public $receiveruser;
    public $selected_Conversations;
    public $message;
    public $auth_email;

    public function mount(){

        $this->auth_email=auth()->user()->email;
    }

    public function load_Conversation_Doctor(Conversation $Conversation ,Doctor $receiver ){

        // dd($receiver);
        $this->selected_Conversations=$Conversation;
        $this->receiveruser=$receiver;

        
        $this->message =Message::where('conversation_id',$this->selected_Conversations->id)->get();
        // dd( $this->message);
    }
    public function load_Conversation_patient(Conversation $Conversation ,Patient $receiver ){

        // dd($receiver);
        $this->selected_Conversations=$Conversation;
        $this->receiveruser=$receiver;

        
        $this->message =Message::where('conversation_id',$this->selected_Conversations->id)->get();
       // dd( $this->message);
    }
    
    public function render()
    {
        return view('livewire.chat.chatbox')->extends('Dashboard.layouts.master');
    }
}
