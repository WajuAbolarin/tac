<?php
namespace Tests\Fakes;

use App\GatewayInterface;
use function GuzzleHttp\json_decode;
use function GuzzleHttp\json_encode;


class FakePayment implements GatewayInterface
{

    public function verify($data)
    {

        return json_decode(
            json_encode(
                [
                    'data' =>
                    [
                        'status' => $data['reference']
                    ]
                ]
            )
        );
    }
};
