<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    public function role()
    {
    	return $this->belongsTo('App\AdminRole', 'admin_role_id');
    }
}
