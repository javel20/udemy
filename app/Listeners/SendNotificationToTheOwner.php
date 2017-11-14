<?php

namespace App\Listeners;

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
        //notificar al dueño
        $message = $event->message;
        Mail::send('emails.contact', ['msg' => $message], function($m) use ($message){
            $m->from($message->email, $message->nombre)
                ->to('javier_el_balla@hotmail.com','javier elias')
                ->subject('Tu mensaje fue recibido');
        });
    }
}
