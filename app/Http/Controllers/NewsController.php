<?php

namespace App\Http\Controllers;

use App\User;
use App\News;
use App\Categories;
use App\Views;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class NewsController extends Controller
{
	 
    public function index($slug)
    {  
    	$news = News::where("slug", $slug)->first();
    	
    	if(!$news){
            abort('404');
        }
         
         $ip = $_SERVER["REMOTE_ADDR"];
	     $news_id = $news->id;
	        
    	 $view = Views::where(array('news_id'=>$news_id,'ip'=>$ip))->first();
    	
    	if(!$view)
    	{
    		$views = new Views;
    		
    		$views->news_id=$news_id;
    		$views->ip=$ip;
		 
	    	$views->save();
	    	
	    	//Update views 
	    	$news->increment('views');
		 
	   		$news->save();
    	}
    	
    	
    	$relatednews = DB::table('news')
						   ->leftJoin('categories', 'news.cat_id', '=', 'categories.id')
						   ->leftJoin('users', 'news.user_id', '=', 'users.id')
						   ->select('news.*','categories.category_name','users.name')
						   ->where('news.cat_id', '=', $news->cat_id)
						   ->orderBy(DB::raw('RAND()'), 'desc')
						   ->take(2)
						   ->whereNotIn('news.id', [$news->id])
						   ->get();
    	
    	 //Layout class
		if(getcong('single_post_column')=='1cls' or getcong('single_post_column')=='1crs')
		{
			$big_class_name='col-lg-8';
			$class_name='col-lg-12 col-md-12';
		}		 		 
		else
		{
			$big_class_name='col-lg-8';
			$class_name='col-lg-12 col-md-12';
		}
    	 			    
        return view('pages.singlenews',compact('news','relatednews','big_class_name','class_name'));
    }
	
	
	public function search(Request $request)
    {   
         
    	$q = $request->query('q');
    	 
    	$latestnews = DB::table('news')
						   ->leftJoin('categories', 'news.cat_id', '=', 'categories.id')
						   ->leftJoin('users', 'news.user_id', '=', 'users.id')
						   ->select('news.*','categories.category_name','users.name')
						   ->where('news.title', "LIKE","%$q%")
						   ->orderBy('id', 'desc')
						   ->paginate(10);
    	
    	 $latestnews->setPath($request->url()); 		
    	 
    	 //Layout class
		if(getcong('search_post_columns')=='1cls' or getcong('search_post_columns')=='1crs')
		{
			$big_class_name='col-lg-8';
			$class_name='col-lg-12 col-md-6';
		}
		elseif(getcong('search_post_columns')=='2cls' or getcong('search_post_columns')=='2crs')
		{
			$big_class_name='col-lg-8';
			$class_name='col-lg-6 col-md-6';
		}
		elseif(getcong('search_post_columns')=='2cns')
		{
			$big_class_name='col-lg-12';
			$class_name='col-lg-6 col-md-6';
		}
		elseif(getcong('search_post_columns')=='3cls' or getcong('search_post_columns')=='3crs')
		{
			$big_class_name='col-lg-8';
			$class_name='col-lg-4 col-md-4';
		}
		elseif(getcong('search_post_columns')=='3cns')
		{
			$big_class_name='col-lg-12';
			$class_name='col-lg-4 col-md-4';
		}
		elseif(getcong('search_post_columns')=='4cns')
		{
			$big_class_name='col-lg-12';
			$class_name='col-lg-3 col-md-3';
		}		 
		else
		{
			$big_class_name='col-lg-8';
			$class_name='col-lg-6 col-md-6';
		}
    	 			    
        return view('pages.searchnews',compact('q','latestnews','big_class_name','class_name'));
    }
    
    public function tags(Request $request)
    {   
         
    	$q = $request->query('tags');
    	 
    	$latestnews = DB::table('news')
						   ->leftJoin('categories', 'news.cat_id', '=', 'categories.id')
						   ->leftJoin('users', 'news.user_id', '=', 'users.id')
						   ->select('news.*','categories.category_name','users.name')
						   ->where('news.tags', "LIKE","%$q%")
						   ->orderBy('id', 'desc')
						   ->paginate(10);
    	
    	 $latestnews->setPath($request->url());
    	 
    	 //Layout class
		if(getcong('tags_post_columns')=='1cls' or getcong('tags_post_columns')=='1crs')
		{
			$big_class_name='col-lg-8';
			$class_name='col-lg-12 col-md-6';
		}
		elseif(getcong('tags_post_columns')=='2cls' or getcong('tags_post_columns')=='2crs')
		{
			$big_class_name='col-lg-8';
			$class_name='col-lg-6 col-md-6';
		}
		elseif(getcong('tags_post_columns')=='2cns')
		{
			$big_class_name='col-lg-12';
			$class_name='col-lg-6 col-md-6';
		}
		elseif(getcong('tags_post_columns')=='3cls' or getcong('tags_post_columns')=='3crs')
		{
			$big_class_name='col-lg-8';
			$class_name='col-lg-4 col-md-4';
		}
		elseif(getcong('tags_post_columns')=='3cns')
		{
			$big_class_name='col-lg-12';
			$class_name='col-lg-4 col-md-4';
		}
		elseif(getcong('tags_post_columns')=='4cns')
		{
			$big_class_name='col-lg-12';
			$class_name='col-lg-3 col-md-3';
		}		 
		else
		{
			$big_class_name='col-lg-8';
			$class_name='col-lg-6 col-md-6';
		} 		
    	 			    
        return view('pages.tagsnews',compact('q','latestnews','big_class_name','class_name'));
    }
	
}
