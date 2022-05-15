<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Town extends Model
{
    public $timestamps = false;

    protected $guarded = [];

    public function district()
    {
        return $this->belongsTo(District::class);
    }

}
