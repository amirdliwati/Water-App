<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class General_informatione extends Model
{
	public $table="general_informationes";

	public function first_form()
    {
        return $this->belongsTo('App\Models\First_form','first_form_id','id');
    }
}
