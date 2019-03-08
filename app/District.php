<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    public $guarded = [];


    public function area()
    {
        return $this->belongsTo(Area::class, 'area_id', 'id');
    }

    public function assemblies()
    {
        return $this->hasMany(Assembly::class, 'district_id', 'id');
    }
}
