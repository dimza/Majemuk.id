<?php

namespace App\Http\Controllers;

use App\User;
use App\News;
use App\Categories;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class CategoryNewsController extends Controller
{
	 
    public function index(Request $request,$slug)
    {   
        
    	$cat = Categories::where("category_slug", $slug)->first();
    	
    	if(!$cat){
            abort('404');
        }
    	
    	$latestnews = DB::table('news')
						   ->leftJoin('categories', 'news.cat_id', '=', 'categories.id')
						   ->leftJoin('users', 'news.user_id', '=', 'users.id')
						   ->select('news.*','categories.category_name','users.name')
						   ->where('news.cat_id', '=', $cat->id)
						   ->orderBy('id', 'desc')
						   ->paginate(10);
    	
    	 $latestnews->setPath($request->url()); 
    	 
    	 //Layout class
		if(getcong('category_post_columns')=='1cls' or getcong('category_post_columns')=='1crs')
		{
			$big_class_name='col-lg-8';
			$class_name='col-lg-12 col-md-6';
		}
		elseif(getcong('category_post_columns')=='2cls' or getcong('category_post_columns')=='2crs')
		{
			$big_class_name='col-lg-8';
			$class_name='col-lg-6 col-md-6';
		}
		elseif(getcong('category_post_columns')=='2cns')
		{
			$big_class_name='col-lg-12';
			$class_name='col-lg-6 col-md-6';
		}
		elseif(getcong('category_post_columns')=='3cls' or getcong('category_post_columns')=='3crs')
		{
			$big_class_name='col-lg-8';
			$class_name='col-lg-4 col-md-4';
		}
		elseif(getcong('category_post_columns')=='3cns')
		{
			$big_class_name='col-lg-12';
			$class_name='col-lg-4 col-md-4';
		}
		elseif(getcong('category_post_columns')=='4cns')
		{
			$big_class_name='col-lg-12';
			$class_name='col-lg-3 col-md-3';
		}		 
		else
		{
			$big_class_name='col-lg-8';
			$class_name='col-lg-6 col-md-6';
		}		
    	 			    
        return view('pages.categorynews',compact('cat','latestnews','big_class_name','class_name'));
    }

}
