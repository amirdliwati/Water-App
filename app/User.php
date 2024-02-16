<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function first_forms()
    {
        return $this->hasMany('App\Models\First_form','user_id','id');
    }

    public function second_forms()
    {
        return $this->hasMany('App\Models\Second_form','user_id','id');
    }

    public function third_forms()
    {
        return $this->hasMany('App\Models\Third_form','user_id','id');
    }

    public function fourth_forms()
    {
        return $this->hasMany('App\Models\Fourth_form','user_id','id');
    }

    public function users_profile()
    {
        return $this->hasOne('App\Models\Users_profile','users_id','id');
    }

    public function logs()
    {
        return $this->hasMany('App\Models\Log','user_id','id');
    }

}
