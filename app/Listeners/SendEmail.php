<?php

namespace App\Listeners;

use App\Events\NewRegistration;
use App\Attendee;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;
use App\Mail\SuccessfulRegistration;

class SendEmail implements ShouldQueue
{

    public $attendee;
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct(Attendee $attendee)
    {
        $this->attendee = $attendee;
    }

    /**
     * Handle the event.
     *
     * @param  NewRegistration  $event
     * @return void
     */
    public function handle(NewRegistration $event)
    {
        Mail::to($event->attendee->email)
            ->send(new SuccessfulRegistration($event->attendee));
    }
}
