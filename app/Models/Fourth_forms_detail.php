<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Fourth_forms_detail extends Model
{
	public $table="fourth_forms_details";

    public function fourth_form()
    {
        return $this->belongsTo('App\Models\Fourth_form','fourth_form_id','id');
    }
}
