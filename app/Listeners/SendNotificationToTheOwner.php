<?php

namespace App\Listeners;

use App\Mail\MensajeRecibido;
use Mail;

use App\Events\MessageWasReceived;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendNotificationToTheOwner implements ShouldQueue
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
        $message = $event->message;

        if(auth()->check()){
            $message->email = auth()->user()->email;
            $message->nombre = auth()->user()->name;
        }

        //class62
        Mail::to('javier_el_balla@hotmail.com','javier elias')->send(new MensajeRecibido($message));

        /*
        //notificar al dueño
        $message = $event->message;
        Mail::send('emails.contact', ['msg' => $message], function($m) use ($message){
            $m->from($message->email, $message->nombre)
                ->to('javier_el_balla@hotmail.com','javier elias')
                ->subject('Tu mensaje fue recibido');
        });
        */
    }
}
