<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VerifyPublisher extends Model
{

    protected $guarded = ['publisher'];

    public function publisher()
    {
        return $this->belongsTo('App\Models\Publisher', 'publisher_id');
    }
}
