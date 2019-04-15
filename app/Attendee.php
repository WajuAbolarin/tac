<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Http\Request;

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

    public function assembly()
    {
        return $this->belongsTo(Assembly::class, 'assembly_id', 'id');
    }

    public function setPaid()
    {
        $this->update(['paid_at' => now()->toDateTimeString()]);
    }

    public function getHasPaidAttribute()
    {
        return !is_null($this->paid_at);
    }

    public function getRegNoAttribute()
    {
        return sprintf('CV19-%05d', $this->id);
    }
    public function payments()
    {
        return  $this->hasMany(Payment::class, 'attendee_id');
    }
    public function toArray()
    {
        return [
            'reg_no' => $this->reg_no,
            'fullname' => $this->fullname,
            'assembly' => $this->assembly->name,
            'district' => $this->assembly->district->name,
            'area' => $this->assembly->district->area->name,
            'age' => $this->age,
            'payment' => $this->has_paid,
            'id' => $this->id
        ];
    }
    public static function getData(Request $request)
    {
        //poor implementation ahead
        $filter = $request->only('area', 'assembly', 'district');
        $per_page = $request->per_page ?: 15;

        if (empty($filter)) {

            return  response()->json(static::paginate($per_page));
        }


        $location = array_keys($request->except('page', 'per_page'))[0];
        switch ($location) {
            case 'area':
                return response()->json(['data' => (Area::find($filter['area']))->attendies()]);
                break;
            case 'district':
                return response()->json(['data' => (District::find($filter['district']))->attendies]);
                break;

            case 'assembly':
                return response()->json(['data' => (Assembly::find($filter['assembly']))->attendies]);
                break;
        }
    }
}
