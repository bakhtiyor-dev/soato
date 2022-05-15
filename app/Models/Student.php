<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $guarded = [];
    public $timestamps = false;

    public function town()
    {
        return $this->belongsTo(Town::class);
    }

    public function district()
    {
        return $this->town->district;
    }

    public function region()
    {
        return $this->district()->region;
    }

    public function getAddressAttribute()
    {
        return "{$this->region()->name}, {$this->district()->name}, {$this->town->name}";
    }

}
