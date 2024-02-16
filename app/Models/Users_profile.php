<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Users_profile extends Model
{
	public $table="users_profiles";
    public function user()
    {
        return $this->belongsTo('App\User','users_id','id');
    }

    public function branch()
    {
        return $this->belongsTo('App\Models\Branch','branch_id','id');
    }

}
