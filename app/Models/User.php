<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
class User extends  Authenticatable
{
    protected $primaryKey = 'id';

    protected $fillable = [
        'username',
        'email',
        'google_id',
        'phone_number',
        'address',
        'password',
        'status',
        'photo_path',
        'points'
    ];

    public function roles(){
        return $this->belongsToMany(Role::class, 'role_ownerships');
    }

    public function courses(){
        return $this->belongsToMany(Course::class, 'user_take_courses');
    }

    public function course_progress(){
        return $this->hasMany(CourseProgress::class);
    }
}
