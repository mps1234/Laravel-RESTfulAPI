<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    const VERIFIED_USER = '1';
    const UNVERIFIED_USER = '0';

    const ADMIN_USER = 'true';
    const REGULAR_USER = 'false';

    protected $dates = ['deleted_at'];
    protected $table = 'users';

    protected $fillable = [
        'name', 
        'email', 
        'password',
        'verified',
        'verification_token',
        'admin',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    //if want to hide from JSON response
    protected $hidden = [
        'password', 'remember_token', 'verification_token',
    ];
    //mutators
    public function setNameAttribute($name){

        $this->attributes['name'] = strtolower($name);

    }
    //accessor
    public function getNameAttribute($name){

       return ucwords($name);

    }
    //mutator for email
     public function setEmailAttribute($email){

        $this->attributes['email'] = strtolower($email);

    }

    public function isVerified(){
        return $this->verified == User::VERIFIED_USER;
    }

    public function isAdmin(){
        return $this->admin == User::ADMIN_USER; 
    }

    public static function generateVerificationCode(){
        return str_random(40);
    }
}

