<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Field_examination extends Model
{
	public $table="field_examinations";

	public function first_form()
    {
        return $this->belongsTo('App\Models\First_form','first_form_id','id');
    }
}
