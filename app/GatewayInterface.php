<?php

namespace App;

interface GatewayInterface
{
    public function verify($data);
}
