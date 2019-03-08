<?php
namespace App;

use GuzzleHttp\Client;


class SMS{

    protected $key;
    protected $client;
    protected $recipient;
    protected $message;
    protected $sender;

    public function __construct($key, Client $client)
    {
        $this->key = $key;
        $this->client = $client;
    }

    public function to($recipient)
    {
        $this->recipient = $recipient;
        return $this;
    }

    public function body($message)
    {
        $this->message = $message;
        return $this;
    }

    public function from($sender)
    {
        $this->sender = $sender;
        return $this;
    }

    public function send()
    {
        $this->client->post($this->constructRequest());
    }

    private function constructRequest()
    {
        $message = urlencode($this->message);
        $recipient = urlencode($this->recipient);
        $sender = urlencode($this->sender);

        return "https://www.bulksmsnigeria.com/api/v1/sms/create?api_token=$this->key&from=$sender&to=$recipient&body=$message";

    }

}
