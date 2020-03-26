<?php

namespace App\Http\Controllers\Admin;

use Auth;
use App\User;
use App\News;
use App\Categories;
use Carbon\Carbon;
use App\Http\Requests;
use Illuminate\Http\Request;
use Session;
use Intervention\Image\Facades\Image; 
use Illuminate\Support\Facades\DB;

class FeaturedNewsController extends MainAdminController
{
	public function __construct()
    {
		 $this->middleware('auth');	
		
		 parent::__construct();
         
    }
    public function featurednews()
    {  
    	if(Auth::User()->usertype!="Admin"){

            \Session::flash('flash_message', 'Access denied!');

            return redirect('admin/dashboard');
            
        }
    
        $allnews = DB::table('news')
						   ->leftJoin('categories', 'news.cat_id', '=', 'categories.id')
						   ->select('news.*','categories.category_name')
						   ->where('news.featured_news', '=', 'yes')
						   ->get();
         
        return view('admin.pages.featurednews',compact('allnews'));
    } 
      
    	
}
