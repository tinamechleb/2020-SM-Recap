<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
	protected $guarded = ['id'];

	public function admin()
	{
		return $this->belongsTo('App\Admin', 'admin_id');
	}

	public function page()
	{
		return $this->belongsTo('App\CmsPage', 'cms_page_id');
	}
}
