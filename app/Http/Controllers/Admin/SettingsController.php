<?php

namespace App\Http\Controllers\Admin;

use Auth;
use App\User;
use App\Settings;
use App\Http\Requests;
use Illuminate\Http\Request;
use Session;
use Intervention\Image\Facades\Image; 

class SettingsController extends MainAdminController
{
	public function __construct()
    {
		 $this->middleware('auth');	
         
    }
    public function settings()
    { 
    	if(Auth::User()->usertype!="Admin"){

            \Session::flash('flash_message', 'Access denied!');

            return redirect('admin/dashboard');
            
        }
        
        $settings = Settings::findOrFail('1');
        
        return view('admin.pages.settings',compact('settings'));
    }	 
    
    public function settingsUpdates(Request $request)
    {  
    		 
    	$settings = Settings::findOrFail('1');
 
	    
	    $data =  \Input::except(array('_token')) ;
	    
	    $rule=array(
		        'site_name' => 'required',
		        'site_email' => 'required'
		   		 );
	    
	   	 $validator = \Validator::make($data,$rule);
 
            if ($validator->fails())
            {
                    return redirect()->back()->withErrors($validator->messages());
            }
	    

	    $inputs = $request->all();
		
		$icon = $request->file('site_logo');
		
		$icon_favicon = $request->file('site_favicon');
		 
		//Logo
		 
        if($icon){
            
           // $icon->move(public_path().'/upload/', 'logo.png');
            
            $tmpFilePath = 'upload/';			
			 
			$hardPath = 'logo.png';
			
            $img = Image::make($icon);

            $img->fit(260, 80)->save($tmpFilePath.$hardPath); 
             
            $settings->site_logo = 'logo.png';
             
        }       
        
        //Favicon
        if($icon_favicon){
        	
        	//$icon_favicon->move(public_path().'/upload/', 'favicon.png');
             
            //$settings->site_favicon = 'favicon.png';
            
            $tmpFilePath = 'upload/';			
			 
			$hardPath = 'favicon.png';
			
            $img = Image::make($icon_favicon);

            $img->fit(16, 16)->save($tmpFilePath.$hardPath); 
             
            $settings->site_favicon = 'favicon.png';
            
             
        }
       
		$settings->site_style = $inputs['site_style'];
		$settings->site_name = $inputs['site_name']; 
		$settings->site_email = $inputs['site_email'];
		$settings->site_description = $inputs['site_description'];
		$settings->site_copyright = $inputs['site_copyright'];
		
		  
		 
	    $settings->save();

	    Session::flash('flash_message', 'Successfully updated!');

        return redirect()->back();
    }
    
    public function layoutsettings(Request $request)
    {  
    		 
    	$settings = Settings::findOrFail('1');
 
	    
	    $data =  \Input::except(array('_token')) ;
	    
	     
	    $inputs = $request->all();
		
		
		$bg_image = $request->file('bg_image');
		
		//Favicon
        if($bg_image){
        	
        	 
            $tmpFilePath = 'upload/';			
			 
			$hardPath = 'bg.png';
			
            $img = Image::make($bg_image);

            $img->save($tmpFilePath.$hardPath); 
             
            $settings->bg_image = 'bg.png';
            
             
        }
		
		 
		$settings->slider_type = $inputs['slider_type']; 
		$settings->home_post_columns = $inputs['home_post_columns'];
		$settings->category_post_columns = $inputs['category_post_columns'];
		$settings->tags_post_columns = $inputs['tags_post_columns'];
		$settings->search_post_columns = $inputs['search_post_columns'];
		$settings->single_post_column = $inputs['single_post_column'];  		  
		 
	    $settings->save();

	    Session::flash('flash_message', 'Successfully updated!');

        return redirect()->back();
    }
    
    public function addthisdisqus(Request $request)
    {  
    		 
    	$settings = Settings::findOrFail('1');
 
	    
	    $data =  \Input::except(array('_token')) ;
	    
	     
	    $inputs = $request->all();
		
		 
		$settings->addthis_share_code = $inputs['addthis_share_code']; 
		$settings->disqus_comment_code = $inputs['disqus_comment_code'];
		$settings->facebook_comment_code = $inputs['facebook_comment_code'];
		 		  
		 
	    $settings->save();

	    Session::flash('flash_message', 'Successfully updated!');

        return redirect()->back();
    }
    
    public function headfootupdate(Request $request)
    {  
    		 
    	$settings = Settings::findOrFail('1');
 
	    
	    $data =  \Input::except(array('_token')) ;
	    
	     
	    $inputs = $request->all();
		
		 
		$settings->site_header_code = $inputs['site_header_code']; 
		$settings->site_footer_code = $inputs['site_footer_code'];
		 
		  
		 
	    $settings->save();

	    Session::flash('flash_message', 'Successfully updated!');

        return redirect()->back();
    } 
    	
}
