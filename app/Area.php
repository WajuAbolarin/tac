<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    public $guarded = [];

    public function districts()
    {
        return $this->hasMany(District::class, 'area_id', 'id');
    }

    public function assemblies()
    {
        return $this->hasManyThrough(Assembly::class, District::class, 'district_id', 'area_id');
    }
}
