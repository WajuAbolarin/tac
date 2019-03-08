<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Attendee;
use Yabacon\Paystack;
use function GuzzleHttp\json_encode;
use App\GatewayInterface;
use Tests\Fakes\FakePayment;

class RegistrationTest extends TestCase
{
    use RefreshDatabase;
    /**
     * @test
     */
    public function registering_an_attendee()
    {
        $this->swap(GatewayInterface::class, new FakePayment);
        $this->withoutExceptionHandling();


        $response = $this->json('POST', '/register', [
            'fullname'      => 'Abolarin Olanrewaju Olabode',
            'email'         =>  'waju.abolarin@gmail.com',
            'phone'         =>  '09028020900',
            'address'       =>  'my house address',
            'assembly_id'   =>  '1',
            'gender'        =>  'male',
            'age'           =>  '2',
            'trxref'        =>  'success',
        ]);

        $response->assertSuccessful();
        $this->assertDatabaseHas('attendees', [
            'fullname' => 'Abolarin Olanrewaju Olabode',
            'assembly_id'   => '1',
        ]);
    }
}
