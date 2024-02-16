<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
	public $table="results";

	public function first_form()
    {
        return $this->belongsTo('App\Models\First_form','first_form_id','id');
    }
}
