<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    public $timestamps = false;

    protected $guarded = [];

    public function towns()
    {
        return $this->hasMany(Town::class);
    }

    public function region()
    {
        return $this->belongsTo(Region::class);
    }

}
