<?php

namespace App\Listeners;

use App\Events\NewRegistration;
use App\Estores;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendSMS implements ShouldQueue
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
     * @param  NewRegistration  $event
     * @return void
     */
    public function handle(NewRegistration $event)
    {
        $e = new Estores($event->attendee);
        return $e->sendMessage();
    }
}
