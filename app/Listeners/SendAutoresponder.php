<?php

namespace App\Listeners;

use App\Mail\TuMensajeFueRecibido;
use Mail;

use App\Events\MessageWasReceived;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendAutoresponder implements ShouldQueue
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  MessageWasReceived  $event
     * @return void
     */
    public function handle(MessageWasReceived $event)
    {
        //Envia autorespondedor
        $message = $event->message;

        if(auth()->check()){
            $message->email = auth()->user()->email;
            $message->nombre = auth()->user()->name;
        }

        //class62
        Mail::to($message->email)->send(new TuMensajeFueRecibido($message));

        /*
        Mail::send('emails.contact', ['msg' => $message], function($m) use ($message){
            $m->to($message->email, $message->nombre)->subject('Tu mensaje fue recibido');
        });
        */
    }
}

