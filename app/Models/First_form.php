<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class First_form extends Model
{
	public $table="first_forms";

	public function field_examination()
    {
        return $this->hasOne('App\Models\Field_examination','first_form_id','id');
    }

    public function general_informatione()
    {
        return $this->hasOne('App\Models\General_informatione','first_form_id','id');
    }

    public function result()
    {
        return $this->hasOne('App\Models\Result','first_form_id','id');
    }

    public function user()
    {
        return $this->belongsTo('App\User','user_id','id');
    }
}
