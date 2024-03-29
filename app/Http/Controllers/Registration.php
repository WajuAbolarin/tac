<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Attendee;
use App\Jobs\NotifyNewAttendee;
use Illuminate\Database\QueryException;
use App\GatewayInterface;
use App\Events\NewRegistration;
use App\Assembly;
use Illuminate\Support\Facades\DB;

class Registration extends Controller
{
    protected $attendee;

    const NEW_ATTENDEE_MESSAGE = 'Congratulations <strong>%s</strong>you have successfuly registered for the Conference, see you there! <strong> Registration No: %s </strong>';

    const DUPLICATE_ATTENDEE_MESSAGE = '<strong>%s</strong>, It seems you are already registered  with us!';


    public function index(Request $request)
    {
        return Attendee::getData($request);
    }

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
            return response()->json([
                'message' => 'We were unable to verify your payment at this time please contact us with this reference numer ' . request()->transaction_ref,
                'level' => 'danger'
            ]);
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
