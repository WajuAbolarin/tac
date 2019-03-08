<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Attendee extends Model
{

    use Notifiable;

    protected $guarded = [];

    protected const AGE = [
        '',
        '12-20yrs',
        '21-30yrs',
        'Over 30',
    ];

    public static function newFromRequest($data)
    {
        $data['age'] = self::AGE[$data['age']];
        $data = array_add($data, 'role_id', 1);

        if (isset($data['transaction_ref'])) {
            $data['transaction_ref'] =  $data['transaction_ref'];
            $data['paid_at'] = now()->toDateTimeString();
        } else {
            $data['transaction_ref'] = null;
            $data['paid_at'] = null;
        }

        $data['email'] = isset($data['email']) ?
            $data['email'] : null;

        return static::firstOrCreate(
            [
                'phone'     => $data['phone'],
                'fullname'  => $data['fullname']
            ],
            [
                'email'             => $data['email'],
                'gender'            => $data['gender'],
                'assembly_id'       => $data['assembly_id'],
                'age'               => $data['age'],
                'address'           => $data['address'],
                'role_id'           => $data['role_id'],
                'transaction_ref'   => $data['transaction_ref'],
                'paid_at'           => $data['paid_at']
            ]
        );
    }


    public function setPaid()
    {
        $this->update(['paid_at' => now()->toDateTimeString()]);
    }

    public function getHasPaidAttribute()
    {
        return !is_null($this->paid_at);
    }
}
