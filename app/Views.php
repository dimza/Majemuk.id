<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Views extends Model
{
    protected $table = 'views';

    protected $fillable = ['news_id', 'ip'];


	public $timestamps = false;
  
}
