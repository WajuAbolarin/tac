<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Attendee;
use App\Jobs\NotifyNewAttendee;
use Illuminate\Database\QueryException;
use App\GatewayInterface;
use App\Events\NewRegistration;

class Registration extends Controller
{
    protected $attendee;
    protected $request;

    protected $payment_message = '<strong> Registration Fee Unpaid </strong>';

    const NEW_ATTENDEE_MESSAGE = 'Congratulations <strong>%s</strong>you have successfuly registered for the Conference, see you there!';

    const DUPLICATE_ATTENDEE_MESSAGE = '<strong>%s</strong>, It seems you are already registered  with us!';


    public function store(Request $request, GatewayInterface $paystack)
    {

        $request->validate([
            'fullname' => 'bail|required|string',
            'email' => 'email',
            'phone' => 'required',
            'gender' => 'required',
            'assembly_id' => 'required',
            'age' => 'required',
            'address' => 'required'
        ]);

        $this->checkPayment($paystack);

        try {
            $this->attendee = Attendee::newFromRequest($request->except(['_token']));

            event(new NewRegistration($this->attendee));

            return $this->respond(self::NEW_ATTENDEE_MESSAGE);
        } catch (QueryException $e) {

            return $this->respond(self::DUPLICATE_ATTENDEE_MESSAGE);
        }
    }

    private function checkPayment(GatewayInterface $paystack)
    {

        if (!request()->has('transaction_ref')) {
            return;
        }

        $check =  $paystack->verify(['reference' => request()->transaction_ref]);

        if (strtolower($check->data->status) !== 'success') {
            return;
        }

        $this->payment_message = '<strong> Registration Fee Paid </strong>';
    }

    public function responseData($message)
    {
        return [
            'message' =>
            sprintf($message . $this->payment_message, request()->fullname),
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
