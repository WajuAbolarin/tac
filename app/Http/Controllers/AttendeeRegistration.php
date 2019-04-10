<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Attendee;
use App\Jobs\NotifyNewAttendee;
use Illuminate\Database\QueryException;
use App\Events\NewRegistration;

class AttendeeRegistration extends Controller
{
    protected $attendee;

    const NEW_ATTENDEE_MESSAGE = 'Congratulations <strong>%s</strong>you have successfuly registered for the Conference, see you there! <strong> Registration No: %s </strong>';

    const DUPLICATE_ATTENDEE_MESSAGE = '<strong>%s</strong>, It seems you are already registered  with us!';


    public function store(Request $request)
    {

        $request->validate([
            'fullname' => 'bail|required|string',
            'email' => 'email',
            'phone' => 'required',
            'gender' => 'required',
            'assembly_id' => 'required',
            'age' => 'required',
            'address' => 'required',
            'payment' => 'required'
        ]);

        try {
            $this->attendee = Attendee::newFromRequest($request->except(['_token']));
            $this->attendee->payments()->create(['amount' => $request->payment]);
            // event(new NewRegistration($this->attendee));

            return $this->respond(self::NEW_ATTENDEE_MESSAGE);
        } catch (QueryException $e) {

            return $this->respond(self::DUPLICATE_ATTENDEE_MESSAGE);
        }
    }

    public function responseData($message)
    {
        return [
            'message' =>
            sprintf($message, request()->fullname, $this->attendee->reg_no),
            'level' => 'success'
        ];
    }


    private function respond($message)
    {
        if (request()->wantsJson()) {
            return response()->json($this->responseData($message), 200);
        }
        return back()->with($this->responseData($message));
    }
}
