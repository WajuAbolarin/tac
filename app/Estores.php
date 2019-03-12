<?php
namespace App;

use GuzzleHttp\Client;

class Estores
{
    private $url = 'https://www.estoresms.com/smsapi.php';
    private $recipient;
    private $reg_no;
    private $name;


    const MESSAGE = '%s, you have successfuly registered for the convocation, Reg number is %s';
    const SENDER = 'TACN Youths';

    public function __construct($attendee)
    {
        $this->recipient    = $attendee->phone;
        $this->reg_no        = $attendee->reg_no;
        $this->name         = $attendee->fullname;
    }

    public function sendMessage()
    {
        $http =  new Client();
        return $http->request(
            'GET',
            $this->url,
            ['query' => [
                'username'      => $this->getUsername(),
                'password'      => $this->getPassword(),
                'sender'        => self::SENDER,
                'recipient'     => $this->recipient,
                'message'       => sprintf(self::MESSAGE, $this->name, $this->reg_no),
                'dnd'           => true
            ]]
        )->getBody();
    }

    private function getUsername()
    {
        return config('services.estores.username');
    }

    private function getPassword()
    {
        return config('services.estores.password');
    }
}
