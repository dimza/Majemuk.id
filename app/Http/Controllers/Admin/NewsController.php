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

class NewsController extends MainAdminController
{
	public function __construct()
    {
		 $this->middleware('auth');	
		
		 parent::__construct();
         
    }
    public function news()    { 
          
        //$allnews = News::orderBy('title')->get();
        
        if(Auth::user()->usertype=='Admin')
        {
			$allnews = DB::table('news')
						   ->leftJoin('categories', 'news.cat_id', '=', 'categories.id')
						   ->select('news.*','categories.category_name')
						   ->get();
		}
		else
		{
			$user_id=Auth::user()->id;
			
			$allnews = DB::table('news')
						   ->leftJoin('categories', 'news.cat_id', '=', 'categories.id')
						   ->select('news.*','categories.category_name')
						   ->where('news.user_id', '=', $user_id)
						   ->get();
		}
        		
        
         
         
        return view('admin.pages.news',compact('allnews'));
    } 
     
    public function addeditNews()    { 
         
        $categories = Categories::orderBy('category_name')->get();
         
        return view('admin.pages.addeditNews',compact('categories'));
    }
    
    public function addnew(Request $request)
    { 
    	
    	$data =  \Input::except(array('_token')) ;
	    
	    $rule=array(
		        'cat_id' => 'required',
		        'title' => 'required',
		        'description' => 'required'
		   		 );
	    
	   	 $validator = \Validator::make($data,$rule);
 
        if ($validator->fails())
        {
                return redirect()->back()->withErrors($validator->messages());
        } 
	    
	    $inputs = $request->all();
		
		if(!empty($inputs['id'])){
           
            $news = News::findOrFail($inputs['id']);

        }else{

            $news = new News;

        }
		
		if($inputs['slug']=="")
		{
			$news_slug = str_slug($inputs['title'], "-");
		}
		else
		{
			$news_slug =str_slug($inputs['slug'], "-"); 
		}
		
		
		//News image
		$news_image = $request->file('image');
		 
        if($news_image){
            
             \File::delete(public_path() .'/upload/news/'.$news->image.'-b.jpg');
		    \File::delete(public_path() .'/upload/news/'.$news->image.'-s.jpg');
		    
            $tmpFilePath = 'upload/news/';			
			 
			$hardPath = substr($news_slug,0,100).'_'.time();
			
            $img = Image::make($news_image);

            $img->fit(800, 550)->save($tmpFilePath.$hardPath.'-b.jpg');
            $img->fit(360, 250)->save($tmpFilePath.$hardPath. '-s.jpg');

            $news->image = $hardPath;
             
        }
		 
		$news->cat_id = $inputs['cat_id'];
		$news->user_id = Auth::User()->id;
		$news->title = $inputs['title']; 
		$news->slug = $news_slug;
		$news->description=$inputs['description'];
		$news->image_title=$inputs['image_title']; 
		//$news->date=Carbon::now();
		$news->source=$inputs['source'];
		$news->tags=$inputs['tags'];
		 
	    $news->save();
		
		if(!empty($inputs['id'])){

            \Session::flash('flash_message', 'Changes Saved');

            return \Redirect::back();
        }else{

            \Session::flash('flash_message', 'Added');

            return \Redirect::back();

        }		     
        
         
    }     
    
    public function editNews($id)    
    {          
          $news = News::findOrFail($id);
          
          $categories = Categories::orderBy('category_name')->get();
          
          if($news->user_id!=Auth::User()->id and  Auth::User()->usertype!="Admin"){

            \Session::flash('flash_message', 'No data found!');

            return \Redirect::back();
            
        }else{
          
          
          return view('admin.pages.addeditNews',compact('news','categories'));
        }
    }	 
    
    public function delete($id)
    {
    	if(Auth::User()->usertype!="Admin"){

            \Session::flash('flash_message', 'Access denied!');

            return redirect('admin/dashboard');
            
        }
        
        $news = News::findOrFail($id);
        
         \File::delete(public_path() .'/upload/news/'.$news->image.'-b.jpg');
		 \File::delete(public_path() .'/upload/news/'.$news->image.'-s.jpg');
        
        $news->delete();

        \Session::flash('flash_message', 'Deleted');

        return redirect()->back();

    }
    
    public function status($id)
    {
    	if(Auth::User()->usertype!="Admin"){

            \Session::flash('flash_message', 'Access denied!');

            return redirect('admin/dashboard');
            
        }
        
        $news = News::findOrFail($id);
       
		if($news->status==1)
		{
			$news->status='0';		 
	   		$news->save();
	   		
	   		\Session::flash('flash_message', 'Unpublished');
		}
		else
		{
			$news->status='1';		 
	   		$news->save();
	   		
	   		\Session::flash('flash_message', 'Published');
		}
		 
        return redirect()->back();

    }
    
    public function sliderhomepage($id)
    {
    	if(Auth::User()->usertype!="Admin"){

            \Session::flash('flash_message', 'Access denied!');

            return redirect('admin/dashboard');
            
        }
        
        $news = News::findOrFail($id);
       
		if($news->slider_news=='yes')
		{
			$news->slider_news='no';		 
	   		$news->save();
	   		
	   		\Session::flash('flash_message', 'Unset from homepage slider');
		}
		else
		{
			$news->slider_news='yes';		 
	   		$news->save();
	   		
	   		\Session::flash('flash_message', 'Set as a slider');
		}
		 
        return redirect()->back();

    }
    
    public function featurednews($id)
    {
    	if(Auth::User()->usertype!="Admin"){

            \Session::flash('flash_message', 'Access denied!');

            return redirect('admin/dashboard');
            
        }
        
        $news = News::findOrFail($id);
       
		if($news->featured_news=='yes')
		{
			$news->featured_news='no';		 
	   		$news->save();
	   		
	   		\Session::flash('flash_message', 'Unset from featured news');
		}
		else
		{
			$news->featured_news='yes';		 
	   		$news->save();
	   		
	   		\Session::flash('flash_message', 'Set as featured news');
		}
		 
        return redirect()->back();

    }
     
    	
}
