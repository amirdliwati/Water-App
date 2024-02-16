<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Third_form extends Model
{
	public $table="third_forms";

    public function user()
    {
        return $this->belongsTo('App\User','user_id','id');
    }
}
