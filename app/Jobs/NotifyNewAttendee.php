<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use App\Attendee;
use App\SMS;

class NotifyNewAttendee implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    // protected $re
    public $attendee;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Attendee $attendee)
    {
        $this->attendee = $attendee;

    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(SMS $sms)
    {
        $message = sprintf('Congrats %s you have successfuly registered for TAC Abuja Metro Youth Convention, see you there!', $this->attendee->fullname);

        $sms->to($this->attendee->phone)
            ->from('TAC Youth')
            ->body($message)
            ->send();
    }
}
