<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AdminSecurity extends Model
{
    protected $guarded = [];
    protected $fillable = [
        'admin_id'
    ];

    public function admin()
    {
        return $this->belongsTo('App\Models\Admin');
    }
}
