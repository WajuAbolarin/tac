<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    public $guarded = [];
    public $hidden = ['created_at', 'updated_at'];


    public function districts()
    {
        return $this->hasMany(District::class, 'area_id', 'id');
    }

    public function assemblies()
    {
        return $this->hasManyThrough(Assembly::class, District::class);
    }

    public function attendies()
    {
        return $this->assemblies->map(function ($assembly) {
            return $assembly->attendies;
        })->flatten();
    }
}
