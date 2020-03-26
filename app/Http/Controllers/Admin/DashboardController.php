<?php

namespace App\Http\Controllers\Admin;

use Auth;
use App\User;
use App\News;
use App\Categories;
use App\Http\Requests;
use Illuminate\Http\Request;


class DashboardController extends MainAdminController
{
	public function __construct()
    {
		 $this->middleware('auth');	
         
    }
    public function index()
    { 
    	if(Auth::user()->usertype=='Admin')
    	{
			$categories_count = Categories::count();
    	
	    	$news_count = News::count();
	    	
	    	$published_news = News::where('status', 1)->count();
	    	
	    	$unpublished_news = News::where('status', 0)->count();
	    	
	    	$slider_news = News::where('slider_news', 'yes')->count();
	    	
	    	$featured_news = News::where('featured_news', 'yes')->count();
	    	
	    	$editor = User::where('usertype', 'Editor')->count();
		}
		else
		{
			$user_id=Auth::user()->id;
			 
	    	$news_count = News::where(['user_id' => $user_id])->count();
	    	
	    	$published_news = News::where(['user_id' => $user_id, 'status' => '1'])->count();
	    	
	    	$unpublished_news = News::where(['user_id' => $user_id, 'status' => '0'])->count();
			
		}
    	
    	
        return view('admin.pages.dashboard',compact('categories_count','news_count','published_news','unpublished_news','slider_news','featured_news','editor'));
    }
	
	 
    	
}
