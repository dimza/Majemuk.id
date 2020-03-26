<?php

namespace App\Http\Controllers\Admin;

use Auth;
use App\User;
use App\Widgets;
use App\Http\Requests;
use Illuminate\Http\Request;
use Session;
use Intervention\Image\Facades\Image; 

class WidgetsController extends MainAdminController
{
	public function __construct()
    {
		 $this->middleware('auth');	
         
    }
    public function index()
    { 	
    	if(Auth::User()->usertype!="Admin"){

            \Session::flash('flash_message', 'Access denied!');

            return redirect('admin/dashboard');
            
        }
        
        $widgets = Widgets::findOrFail('1');
        
        return view('admin.pages.widgets',compact('widgets'));
    }	 
    
    public function footerWidgets(Request $request)
    {  
    		 
    	$widgets = Widgets::findOrFail('1');
 
	    
	    $data =  \Input::except(array('_token')) ;
	     

	    $inputs = $request->all();
		
		     
		$widgets->about_news_title = $inputs['about_news_title'];
		$widgets->about_news = $inputs['about_news']; 
		
		$widgets->social_media_title = $inputs['social_media_title'];
		$widgets->social_media_code = $inputs['social_media_code'];
		
		$widgets->contact_title = $inputs['contact_title'];
		$widgets->contact_address = $inputs['contact_address'];
		$widgets->contact_phone = $inputs['contact_phone'];
		$widgets->contact_email = $inputs['contact_email'];  
		 
	    $widgets->save();

	    Session::flash('flash_message', 'Successfully updated!');

        return redirect()->back();
    }
    
    public function socialmedialink(Request $request)
    {  
    		 
    	$widgets = Widgets::findOrFail('1');
 
	    
	    $data =  \Input::except(array('_token')) ;
	     

	    $inputs = $request->all();
		
		     
		 
		$widgets->social_facebook = $inputs['social_facebook'];
		$widgets->social_twitter = $inputs['social_twitter'];		
		$widgets->social_linkedin = $inputs['social_linkedin'];
		$widgets->social_dribbble = $inputs['social_dribbble'];
		$widgets->social_youtube = $inputs['social_youtube'];
		$widgets->social_behance = $inputs['social_behance'];  
		 
	    $widgets->save();

	    Session::flash('flash_message', 'Successfully updated!');

        return redirect()->back();
    }
    
    public function recent_popular_posts(Request $request)
    {  
    		 
    	$widgets = Widgets::findOrFail('1');
 
	    
	    $data =  \Input::except(array('_token')) ;
	     

	    $inputs = $request->all();
		
		     
		 
		$widgets->recent_posts_title = $inputs['recent_posts_title'];
		$widgets->recent_posts_limit = $inputs['recent_posts_limit'];	
		$widgets->popular_posts_title = $inputs['popular_posts_title'];
		$widgets->popular_posts_limit = $inputs['popular_posts_limit'];		
		 
		 
	    $widgets->save();

	    Session::flash('flash_message', 'Successfully updated!');

        return redirect()->back();
    }
    
    public function featuredpost(Request $request)
    {  
    		 
    	$widgets = Widgets::findOrFail('1');
 
	    
	    $data =  \Input::except(array('_token')) ;
	     

	    $inputs = $request->all();
		
		     
		 
		$widgets->featured_title = $inputs['featured_title'];
		$widgets->featured_post_limit = $inputs['featured_post_limit'];		
		 
		 
	    $widgets->save();

	    Session::flash('flash_message', 'Successfully updated!');

        return redirect()->back();
    }
    
    public function advertise(Request $request)
    {  
    		 
    	$widgets = Widgets::findOrFail('1');
 
	    
	    $data =  \Input::except(array('_token')) ;
	     

	    $inputs = $request->all();
		
		     
		 
		$widgets->header_advertise = $inputs['header_advertise'];
		$widgets->sidebar_advertise = $inputs['sidebar_advertise'];		
		 
		 
	    $widgets->save();

	    Session::flash('flash_message', 'Successfully updated!');

        return redirect()->back();
    }
    	
}
