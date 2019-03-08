<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Attendee;

class SuccessfulRegistration extends Mailable
{
    use Queueable, SerializesModels;

    const NEW_ATTENDEE_MESSAGE = 'Congratulations **%s** you have successfuly registered for the Conference, see you there!';

    public $message;
    public $isPaid;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Attendee $attendee)
    {
        $this->isPaid = $attendee->hasPaid;
        $this->message = sprintf(self::NEW_ATTENDEE_MESSAGE, $attendee->fullname);
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.successful-registration')
            ->subject('Conference Registration')
            ->from('noreply@tacnabujametro.org', 'TACN Abuja Metro Youths');
    }
}
