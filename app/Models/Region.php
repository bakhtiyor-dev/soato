<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    public $timestamps = false;
    protected $guarded = [];

    public function districts()
    {
        return $this->hasMany(District::class);
    }
}
