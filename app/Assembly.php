<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Assembly extends Model
{

    public $guarded = [];


    public function district()
    {
        return $this->belongsTo(District::class, 'district_id', 'id');
    }
}
