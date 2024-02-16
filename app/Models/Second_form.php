<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Second_form extends Model
{
	public $table="second_forms";

    public function user()
    {
        return $this->belongsTo('App\User','user_id','id');
    }
}
