<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AdminRolePermission extends Model
{
    public function page()
    {
        return $this->belongsTo('App\CmsPage', 'cms_page_id');
    }
}
