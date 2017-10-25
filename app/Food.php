<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
	protected $fillable = ['name', 'description','price','section_id','image_url'];
 	public function section()
 	{
 		return $this->belongsTo('App\Section');
 	}
}
