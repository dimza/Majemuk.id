<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Addition extends Model
{
    protected $table = 'addition';

    protected $fillable = ['privacy_title', 'privacy_post', 'disclaimer_title', 'disclaimer_post','sitemap_title','sitemap_post'];


   /* public function post()
    {
        return $this->hasMany('App\Posts', 'category_id');
    }
   */
	
	 public $timestamps = false;
    
}
