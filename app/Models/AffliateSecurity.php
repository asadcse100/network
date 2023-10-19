<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AffliateSecurity extends Model
{
    protected $guarded = [];
    protected $fillable = [
        'affliate_id'
    ];

    public function affliate()
    {
        return $this->belongsTo('App\Models\Affliate');
    }
}
