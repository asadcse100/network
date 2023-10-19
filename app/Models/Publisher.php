<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Publisher extends Authenticatable

{
    use Notifiable;
    protected $guard = 'publisher';

    protected $fillable = [
        'name', 'email', 'password',
    ];

    protected $hidden = [
        'password', 'remember_token'
    ];

    public function loginSecurity()
    {
        return $this->hasOne('App\Models\LoginSecurity');
    }

}
