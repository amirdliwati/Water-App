<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Fourth_form extends Model
{
	public $table="fourth_forms";

    public function user()
    {
        return $this->belongsTo('App\User','user_id','id');
    }

    public function fourth_forms_details()
    {
        return $this->hasMany('App\Models\Fourth_forms_detail','fourth_form_id','id');
    }
}
