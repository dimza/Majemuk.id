<?php

namespace App\Http\Controllers\Admin;

use Auth;
use App\User;
use App\Addition;
use App\Http\Requests;
use Illuminate\Http\Request;
use Session;
use Intervention\Image\Facades\Image; 

class AdditionController extends MainAdminController
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
        
        $addition = Addition::findOrFail('1');
        
        return view('admin.pages.addition',compact('addition'));
    }	 
    
    public function disclaimer(Request $request)
    {  
    		 
    	$addition = Addition::findOrFail('1');
 
	    
	    $data =  \Input::except(array('_token')) ;
	     

	    $inputs = $request->all();
		
		     
		$addition->disclaimer_title = $inputs['disclaimer_title'];
		$addition->disclaimer_post = $inputs['disclaimer_post']; 
		 
	    $addition->save();

	    Session::flash('flash_message', 'Successfully updated!');

        return redirect()->back();
    }
    
    public function privacy(Request $request)
    {  
    		 
    	$addition = Addition::findOrFail('1');
 
	    
	    $data =  \Input::except(array('_token')) ;
	     

	    $inputs = $request->all();   
		 
		$addition->privacy_title = $inputs['privacy_title'];
		$addition->privacy_post = $inputs['privacy_post'];  
		 
	    $addition->save();

	    Session::flash('flash_message', 'Successfully updated!');

        return redirect()->back();
    }
    
    public function sitemap(Request $request)
    {  
    		 
    	$addition = Addition::findOrFail('1');
 
	    $data =  \Input::except(array('_token')) ;	     

	    $inputs = $request->all();

		 
		$addition->sitemap_title = $inputs['sitemap_title'];
		$addition->sitemap_post = $inputs['sitemap_post'];
		 
	    $addition->save();

	    Session::flash('flash_message', 'Successfully updated!');

        return redirect()->back();
    }
    	
}
