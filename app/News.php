<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $table = 'news';

    protected $fillable = ['cat_id', 'user_id','title','slug','description','image','date','source','tags','slider_news'];


	//public $timestamps = false;
 
	public function category()
    {
        return $this->hasMany('App\Categories', 'id');
    }
}
