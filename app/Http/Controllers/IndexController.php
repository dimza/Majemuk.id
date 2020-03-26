<?php

namespace App\Http\Controllers;

use App\User;
use App\News;
use App\Categories;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class IndexController extends Controller
{
	 

    public function index()
    { 
    	if(!$this->alreadyInstalled()) {
            return redirect('install');
        }
    	
    	$newsticker = DB::table('news')
						   ->leftJoin('categories', 'news.cat_id', '=', 'categories.id')
						   ->leftJoin('users', 'news.user_id', '=', 'users.id')
						   ->select('news.*','categories.category_name','users.name')
						   ->where('news.status', '=', 1)
						   ->orderBy('id', 'desc')
						   ->take(5)
						   ->get();
						   
    	$slidernews = DB::table('news')
						   ->leftJoin('categories', 'news.cat_id', '=', 'categories.id')
						   ->leftJoin('users', 'news.user_id', '=', 'users.id')
						   ->select('news.*','categories.category_name','users.name')
						   ->where('news.status', '=', 1)
						   ->where('news.slider_news', '=', 'yes')
						   ->get();
		
		$latestnews = DB::table('news')
						   ->leftJoin('categories', 'news.cat_id', '=', 'categories.id')
						   ->leftJoin('users', 'news.user_id', '=', 'users.id')
						   ->select('news.*','categories.category_name','users.name')
						   ->where('news.status', '=', 1)
						   ->orderBy('id', 'desc')
						   ->paginate(10);
		
		//Layout class
		if(getcong('home_post_columns')=='1cls' or getcong('home_post_columns')=='1crs')
		{
			$big_class_name='col-lg-8';
			$class_name='col-lg-12 col-md-6';
		}
		elseif(getcong('home_post_columns')=='2cls' or getcong('home_post_columns')=='2crs')
		{
			$big_class_name='col-lg-8';
			$class_name='col-lg-6 col-md-6';
		}
		elseif(getcong('home_post_columns')=='2cns')
		{
			$big_class_name='col-lg-12';
			$class_name='col-lg-6 col-md-6';
		}
		elseif(getcong('home_post_columns')=='3cls' or getcong('home_post_columns')=='3crs')
		{
			$big_class_name='col-lg-8';
			$class_name='col-lg-4 col-md-4';
		}
		elseif(getcong('home_post_columns')=='3cns')
		{
			$big_class_name='col-lg-12';
			$class_name='col-lg-4 col-md-4';
		}
		elseif(getcong('home_post_columns')=='4cns')
		{
			$big_class_name='col-lg-12';
			$class_name='col-lg-3 col-md-3';
		}		 
		else
		{
			$big_class_name='col-lg-8';
			$class_name='col-lg-6 col-md-6';
		}
		
						   
        return view('pages.index',compact('slidernews','newsticker','latestnews','big_class_name','class_name'));
    }
    
    /**
     * If application is already installed.
     *
     * @return bool
     */
    public function alreadyInstalled()
    {
        return file_exists(storage_path('installed'));
    }


}
