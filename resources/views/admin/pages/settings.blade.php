@extends("admin.admin_app")

@section("content")

<div id="main">
	<div class="page-header">
		<h2> Settings</h2>
		<a href="{{ URL::to('admin/dashboard') }}" class="btn btn-default-light btn-xs"><i class="md md-backspace"></i> Back</a>
	  
	</div>
	@if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
	 @if(Session::has('flash_message'))
				    <div class="alert alert-success">
				    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
<span aria-hidden="true">&times;</span></button>
				        {{ Session::get('flash_message') }}
				    </div>
				@endif
    <div role="tabpanel">
    <!-- Nav tabs -->
    <ul class="nav nav-tabs" role="tablist">
        <li role="presentation" class="active">
            <a href="#account" aria-controls="account" role="tab" data-toggle="tab">General Settings</a>
        </li>
        <li role="presentation">
            <a href="#layout_settings" aria-controls="other_Settings" role="tab" data-toggle="tab">Layout Settings</a>
        </li>
        <li role="presentation">
            <a href="#share_comments" aria-controls="share_comments" role="tab" data-toggle="tab">AddThis, Facebook & Disqus Settings</a>
        </li>
        <li role="presentation">
            <a href="#other_Settings" aria-controls="other_Settings" role="tab" data-toggle="tab">Other Settings</a>
        </li>        
         
    </ul>

    <!-- Tab panes -->
    <div class="tab-content tab-content-default">
        <div role="tabpanel" class="tab-pane active" id="account">             
            {!! Form::open(array('url' => 'admin/settings','class'=>'form-horizontal padding-15','name'=>'account_form','id'=>'account_form','role'=>'form','enctype' => 'multipart/form-data')) !!}
                
                <div class="form-group">
                    <label for="" class="col-sm-3 control-label">Site Style</label>
                    <div class="col-sm-4">
                        <select id="basic" name="site_style" class="selectpicker show-tick form-control">
                        	 		
                        	 		<option value="">Default</option>
                        	 		
		                        	<option value="blue" @if($settings->site_style=='blue')selected @endif>Blue</option>
		                        	<option value="brown" @if($settings->site_style=='brown')selected @endif >Brown</option>
		                        	<option value="green" @if($settings->site_style=='green')selected @endif >Green</option>
		                        	<option value="green2" @if($settings->site_style=='green2')selected @endif >Green 2</option>
		                        	<option value="grey" @if($settings->site_style=='grey')selected @endif >Grey</option>
									<option value="greyish-blue" @if($settings->site_style=='greyish-blue')selected @endif >Greyish Blue</option>
									<option value="oldrose" @if($settings->site_style=='oldrose')selected @endif >Old Rose</option>
									<option value="orange" @if($settings->site_style=='orange')selected @endif >Orange</option>
									<option value="pink" @if($settings->site_style=='pink')selected @endif >Pink</option>
									<option value="purple" @if($settings->site_style=='purple')selected @endif >Purple</option>		
									<option value="red" @if($settings->site_style=='red')selected @endif >Red</option>
									<option value="yellow" @if($settings->site_style=='yellow')selected @endif >Yellow</option>
			                        	 
	                        	 
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="avatar" class="col-sm-3 control-label">Logo</label>
                    <div class="col-sm-9">
                        <div class="media">
                            <div class="media-left">
                                @if($settings->site_logo)
                                 
									<img src="{{ URL::asset('upload/'.$settings->site_logo) }}" width="150" alt="person">
								@endif
								                                
                            </div>
                            <div class="media-body media-middle">
                                <input type="file" name="site_logo" class="filestyle">
                                <small class="text-muted bold">Size 200x75px</small>
                            </div>
                        </div>
	
                    </div>
                </div>
				<div class="form-group">
                    <label for="avatar" class="col-sm-3 control-label">Favicon</label>
                    <div class="col-sm-9">
                        <div class="media">
                            <div class="media-left">
                                @if($settings->site_favicon)
                                 
									<img src="{{ URL::asset('upload/'.$settings->site_favicon) }}" alt="person">
								@endif
								                                
                            </div>
                            <div class="media-body media-middle">
                                <input type="file" name="site_favicon" class="filestyle">
                                <small class="text-muted bold">Size 16x16px</small>
                            </div>
                        </div>
	
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="col-sm-3 control-label">Site Name</label>
                    <div class="col-sm-9">
                        <input type="text" name="site_name" value="{{ $settings->site_name }}" class="form-control" value="">
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="col-sm-3 control-label">Site Email</label>
                    <div class="col-sm-9">
                        <input type="email" name="site_email" value="{{ $settings->site_email }}" class="form-control" value="">
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="col-sm-3 control-label">Site Description</label>
                    <div class="col-sm-9">
                        <textarea type="text" name="site_description" class="form-control" rows="5" placeholder="A few words about site">{{ $settings->site_description }}</textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="col-sm-3 control-label">Copyright Text</label>
                    <div class="col-sm-9">
                        <textarea type="text" name="site_copyright" class="form-control" rows="5">{{ $settings->site_copyright }}</textarea>
                    </div>
                </div>
                <hr>
                <div class="form-group">
                    <div class="col-md-offset-3 col-sm-9 ">
                    	<button type="submit" class="btn btn-primary">Save Changes <i class="md md-lock-open"></i></button>
                         
                    </div>
                </div>

            {!! Form::close() !!} 
        </div>
        
        <div role="tabpanel" class="tab-pane" id="layout_settings">             
            {!! Form::open(array('url' => 'admin/layoutsettings','class'=>'form-horizontal padding-15','name'=>'layout_settings_form','id'=>'layout_settings_form','role'=>'form','enctype' => 'multipart/form-data')) !!}
                
                <div class="form-group">
                    <label for="avatar" class="col-sm-3 control-label">Background Image</label>
                    <div class="col-sm-9">
                        <div class="media">
                            <div class="media-left">
                                @if($settings->bg_image)
                                 
									<img src="{{ URL::asset('upload/'.$settings->bg_image) }}" alt="bg image" width="150">
								@endif
								                                
                            </div>
                            <div class="media-body media-middle">
                                <input type="file" name="bg_image" class="filestyle">
                                 
                            </div>
                        </div>
	
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="col-sm-3 control-label">Home Slider</label>
                    <div class="col-sm-4">
                        <select id="basic" name="slider_type" class="selectpicker show-tick form-control"> 
                        	 		 
		                        	<option value="slider1" @if($settings->slider_type=='slider1')selected @endif>Slider 1</option>
		                        	<option value="slider2" @if($settings->slider_type=='slider2')selected @endif >Slider 2</option> 
		                         
                        </select>
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="" class="col-sm-3 control-label">Home Page Layout</label>
                    <div class="col-sm-4">
                        <select id="basic" name="home_post_columns" class="selectpicker show-tick form-control"> 
                        	 		 
		                        	<option value="1cls" @if($settings->home_post_columns=='1cls')selected @endif>1 Column with Left Sidebar</option>
		                        	<option value="1crs" @if($settings->home_post_columns=='1crs')selected @endif>1 Column with Right Sidebar</option>
		                        	
		                        	<option value="2cls" @if($settings->home_post_columns=='2cls')selected @endif>2 Columns with Left Sidebar</option>
		                        	<option value="2crs" @if($settings->home_post_columns=='2crs')selected @endif>2 Columns with Right Sidebar</option>
		                        	<option value="2cns" @if($settings->home_post_columns=='2cns')selected @endif>2 Columns No Sidebar</option>
		                        	
		                        	<option value="3cls" @if($settings->home_post_columns=='3cls')selected @endif>3 Columns with Left Sidebar</option>
		                        	<option value="3crs" @if($settings->home_post_columns=='3crs')selected @endif>3 Columns with Right Sidebar</option>
		                        	<option value="3cns" @if($settings->home_post_columns=='3cns')selected @endif>3 Columns No Sidebar</option>
		                        	
		                        	 <option value="4cns" @if($settings->home_post_columns=='4cns')selected @endif>4 Columns No Sidebar</option>
		                         
                        </select>
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="" class="col-sm-3 control-label">Category Page Layout</label>
                    <div class="col-sm-4">
                        <select id="basic" name="category_post_columns" class="selectpicker show-tick form-control"> 
                        	 		 
		                        	<option value="1cls" @if($settings->category_post_columns=='1cls')selected @endif>1 Column with Left Sidebar</option>
		                        	<option value="1crs" @if($settings->category_post_columns=='1crs')selected @endif>1 Column with Right Sidebar</option>
		                        	
		                        	<option value="2cls" @if($settings->category_post_columns=='2cls')selected @endif>2 Columns with Left Sidebar</option>
		                        	<option value="2crs" @if($settings->category_post_columns=='2crs')selected @endif>2 Columns with Right Sidebar</option>
		                        	<option value="2cns" @if($settings->category_post_columns=='2cns')selected @endif>2 Columns No Sidebar</option>
		                        	
		                        	<option value="3cls" @if($settings->category_post_columns=='3cls')selected @endif>3 Columns with Left Sidebar</option>
		                        	<option value="3crs" @if($settings->category_post_columns=='3crs')selected @endif>3 Columns with Right Sidebar</option>
		                        	<option value="3cns" @if($settings->category_post_columns=='3cns')selected @endif>3 Columns No Sidebar</option>
		                        	
		                        	 <option value="4cns" @if($settings->category_post_columns=='4cns')selected @endif>4 Columns No Sidebar</option>
		                         
                        </select>
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="" class="col-sm-3 control-label">Tags Page Layout</label>
                    <div class="col-sm-4">
                        <select id="basic" name="tags_post_columns" class="selectpicker show-tick form-control"> 
                        	 		 
		                        	<option value="1cls" @if($settings->tags_post_columns=='1cls')selected @endif>1 Column with Left Sidebar</option>
		                        	<option value="1crs" @if($settings->tags_post_columns=='1crs')selected @endif>1 Column with Right Sidebar</option>
		                        	
		                        	<option value="2cls" @if($settings->tags_post_columns=='2cls')selected @endif>2 Columns with Left Sidebar</option>
		                        	<option value="2crs" @if($settings->tags_post_columns=='2crs')selected @endif>2 Columns with Right Sidebar</option>
		                        	<option value="2cns" @if($settings->tags_post_columns=='2cns')selected @endif>2 Columns No Sidebar</option>
		                        	
		                        	<option value="3cls" @if($settings->tags_post_columns=='3cls')selected @endif>3 Columns with Left Sidebar</option>
		                        	<option value="3crs" @if($settings->tags_post_columns=='3crs')selected @endif>3 Columns with Right Sidebar</option>
		                        	<option value="3cns" @if($settings->tags_post_columns=='3cns')selected @endif>3 Columns No Sidebar</option>
		                        	
		                        	 <option value="4cns" @if($settings->tags_post_columns=='4cns')selected @endif>4 Columns No Sidebar</option>
		                         
                        </select>
                    </div>
                </div>
				
				<div class="form-group">
                    <label for="" class="col-sm-3 control-label">Search Page Layout</label>
                    <div class="col-sm-4">
                        <select id="basic" name="search_post_columns" class="selectpicker show-tick form-control"> 
                        	 		 
		                        	<option value="1cls" @if($settings->search_post_columns=='1cls')selected @endif>1 Column with Left Sidebar</option>
		                        	<option value="1crs" @if($settings->search_post_columns=='1crs')selected @endif>1 Column with Right Sidebar</option>
		                        	
		                        	<option value="2cls" @if($settings->search_post_columns=='2cls')selected @endif>2 Columns with Left Sidebar</option>
		                        	<option value="2crs" @if($settings->search_post_columns=='2crs')selected @endif>2 Columns with Right Sidebar</option>
		                        	<option value="2cns" @if($settings->search_post_columns=='2cns')selected @endif>2 Columns No Sidebar</option>
		                        	
		                        	<option value="3cls" @if($settings->search_post_columns=='3cls')selected @endif>3 Columns with Left Sidebar</option>
		                        	<option value="3crs" @if($settings->search_post_columns=='3crs')selected @endif>3 Columns with Right Sidebar</option>
		                        	<option value="3cns" @if($settings->search_post_columns=='3cns')selected @endif>3 Columns No Sidebar</option>
		                        	
		                        	 <option value="4cns" @if($settings->search_post_columns=='4cns')selected @endif>4 Columns No Sidebar</option>
		                         
                        </select>
                    </div>
                </div>
				
				<div class="form-group">
                    <label for="" class="col-sm-3 control-label">Single Post Layout</label>
                    <div class="col-sm-4">
                        <select id="basic" name="single_post_column" class="selectpicker show-tick form-control"> 
                        	<option value="1cls" @if($settings->single_post_column=='1cls')selected @endif>Left Sidebar</option>
		                    <option value="1crs" @if($settings->single_post_column=='1crs')selected @endif>Right Sidebar</option>
		                        	
		                        	  
                        </select>
                    </div>
                </div>
                <hr>
                <div class="form-group">
                    <div class="col-md-offset-3 col-sm-9 ">
                    	<button type="submit" class="btn btn-primary">Save Changes <i class="md md-lock-open"></i></button>
                         
                    </div>
                </div>

            {!! Form::close() !!} 
        </div>
        <div role="tabpanel" class="tab-pane" id="share_comments">
            
            {!! Form::open(array('url' => 'admin/addthisdisqus','class'=>'form-horizontal padding-15','name'=>'pass_form','id'=>'pass_form','role'=>'form')) !!}
                
                 
                <div class="form-group">
                    <label for="" class="col-sm-3 control-label">AddThis Code</label>
                    <div class="col-sm-9">
                        <textarea type="text" name="addthis_share_code" class="form-control" rows="5">{{ $settings->addthis_share_code }}</textarea>
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="" class="col-sm-3 control-label">Disqus Comment Code</label>
                    <div class="col-sm-9">
                        <textarea type="text" name="disqus_comment_code" class="form-control" rows="5">{{ $settings->disqus_comment_code }}</textarea>
                    </div>
                </div>
                 
                <div class="form-group">
                    <label for="" class="col-sm-3 control-label">Facebook Comment Code</label>
                    <div class="col-sm-9">
                        <textarea type="text" name="facebook_comment_code" class="form-control" rows="5">{{ $settings->facebook_comment_code }}</textarea>
                    </div>
                </div> 
                 
                <hr>
                <div class="form-group">
                    <div class="col-md-offset-3 col-sm-9 ">
                        <button type="submit" class="btn btn-primary">Save Changes <i class="md md-lock-open"></i></button>
                    </div>
                </div>

            {!! Form::close() !!} 
        </div>
        
        <div role="tabpanel" class="tab-pane" id="other_Settings">
            
            {!! Form::open(array('url' => 'admin/headfootupdate','class'=>'form-horizontal padding-15','name'=>'pass_form','id'=>'pass_form','role'=>'form')) !!}
                
                 
                <div class="form-group">
                    <label for="" class="col-sm-3 control-label">Header Code</label>
                    <div class="col-sm-9">
                        <textarea type="text" name="site_header_code" class="form-control" rows="5" placeholder="You may want to add some html/css/js code to header. ">{{ $settings->site_header_code }}</textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="col-sm-3 control-label">Footer Code</label>
                    <div class="col-sm-9">
                        <textarea type="text" name="site_footer_code" class="form-control" rows="5" placeholder="You may want to add some html/css/js code to footer. ">{{ $settings->site_footer_code }}</textarea>
                    </div>
                </div>
                 
                <hr>
                <div class="form-group">
                    <div class="col-md-offset-3 col-sm-9 ">
                        <button type="submit" class="btn btn-primary">Save Changes <i class="md md-lock-open"></i></button>
                    </div>
                </div>

            {!! Form::close() !!} 
        </div>
         
    </div>
</div>
</div>

@endsection