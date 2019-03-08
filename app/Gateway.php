<?php
namespace App;

use App\GatewayInterface;
use Yabacon\Paystack;

class Gateway implements GatewayInterface
{
    protected $client;

    public function __construct(Paystack $p)
    {
        $this->client = $p;
    }

    public function verify($data)
    {
        return $this->client->transaction->verify($data);
    }
};
