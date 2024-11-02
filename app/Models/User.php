<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
class user extends  Authenticatable
{
    protected $primaryKey = 'id';

    protected $fillable = [
        'username',
        'email',
        'phone_number',
        'address',
        'password'
    ];

    public function roles(){
        return $this->belongsToMany(Role::class, 'role_ownerships');
    }


}
