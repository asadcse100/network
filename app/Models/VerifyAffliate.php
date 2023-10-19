<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VerifyAffliate extends Model
{

    protected $guarded = ['affliate'];

    public function affliate()
    {
        return $this->belongsTo('App\Models\Affliate', 'affliate_id');
    }
}
