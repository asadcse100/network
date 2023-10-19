<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LoginSecurity extends Model
{
    protected $guarded = [];
    protected $fillable = [
        'publisher_id'
    ];

    public function publisher()
    {
        return $this->belongsTo('App\Models\Publisher');
    }
}