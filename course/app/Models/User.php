<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function post(){

        return $this->hasOne('App\Models\Post');

    }

    public function posts(){

        return $this->hasMany('App\Models\Post');

    }

    public function roles(){

        return $this->belongsToMany('App\Models\Role')->withPivot('created_at');

        // To customize tables name and columns follow this format
        // return $this->belongsToMany('App\Models\Role', 'role_user', 'user_id', 'role_id');

    }

    public function photos(){

        return $this->morphMany('App\Models\Photo', 'imageable');

    }

    public function getNameAttribute($value){

        return ucfirst($value);

    }

    public function setNameAttribute($value){

        $this->attributes['name'] = strtoupper($value);

    }

}
