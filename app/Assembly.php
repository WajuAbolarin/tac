<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Assembly extends Model
{

    public $guarded = [];
    public $hidden = ['created_at', 'updated_at'];

    public function district()
    {
        return $this->belongsTo(District::class, 'district_id', 'id');
    }

    public function attendies()
    {
        return $this->hasMany(Attendee::class);
    }
}
