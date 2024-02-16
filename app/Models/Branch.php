<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
	public $table="branchs";

	public function users_profile()
    {
        return $this->hasOne('App\Models\Users_profile','branch_id','id');
    }
}
