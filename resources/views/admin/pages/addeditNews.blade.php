@extends("admin.admin_app")

@section("content")

<div id="main">
	<div class="page-header">
		<h2> {{ isset($news->title) ? 'Edit: '. $news->title : 'Add news' }}</h2>
		
		<a href="{{ URL::to('admin/news') }}" class="btn btn-default-light btn-xs"><i class="md md-backspace"></i> Back</a>
	  
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
   
   	<div class="panel panel-default">
            <div class="panel-body">
                {!! Form::open(array('url' => array('admin/news/addnews'),'class'=>'form-horizontal padding-15','name'=>'news_form','id'=>'news_form','role'=>'form','enctype' => 'multipart/form-data')) !!} 
                <input type="hidden" name="id" value="{{ isset($news->id) ? $news->id : null }}">
                <div class="form-group">
                    <label for="" class="col-sm-3 control-label">Category</label>
                    <div class="col-sm-9">
                        <select id="basic" name="cat_id" class="selectpicker show-tick form-control">
                        	<option value="">Select Category</option>
                        	
                        	@foreach($categories as $i => $category)	
	                        	@if(isset($news->cat_id) && $news->cat_id==$category->id)  
		                        	<option value="{{$category->id}}" selected >{{$category->category_name}}</option>
		                        	 
	                        	@else
	                        	<option value="{{$category->id}}">{{$category->category_name}}</option> 
	                        	@endif                       	
                        	@endforeach
                        </select>
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="" class="col-sm-3 control-label">Title</label>
                    <div class="col-sm-9">
                        <input type="text" name="title" value="{{ isset($news->title) ? $news->title : null }}" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="col-sm-3 control-label">Slug</label>
                    <div class="col-sm-9">
                        <input type="text" name="slug" value="{{ isset($news->slug) ? $news->slug : null }}" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="col-sm-3 control-label">Description</label>
                    <div class="col-sm-9">
                        <textarea name="description" id="description" cols="30" rows="10" class="summernote">{{ isset($news->description) ? $news->description : null }}</textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="col-sm-3 control-label">Image Title</label>
                    <div class="col-sm-9">
                        <input type="text" name="image_title" value="{{ isset($news->image_title) ? $news->image_title : null }}" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label for="avatar" class="col-sm-3 control-label">Image</label>
                    <div class="col-sm-9">
                        <div class="media">
                            <div class="media-left">
                                @if(isset($news->image))
                                 
									<img src="{{ URL::asset('upload/news/'.$news->image.'-s.jpg') }}" width="100" alt="person">
								@endif
								                                
                            </div>
                            <div class="media-body media-middle">
                                <input type="file" name="image" class="filestyle"> 
                            </div>
                        </div>
	
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="" class="col-sm-3 control-label">Source</label>
                    <div class="col-sm-9">                         
                        <input type="text" name="source" value="{{ isset($news->source) ? $news->source : null }}" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="col-sm-3 control-label">Tags</label>
                    <div class="col-sm-9">                         
                        <input type="text" name="tags" value="{{ isset($news->tags) ? $news->tags : null }}" data-role="tagsinput tag-primary" class="form-control">
                    </div>
                </div>
                <hr>
                <div class="form-group">
                    <div class="col-md-offset-3 col-sm-9 ">
                    	<button type="submit" class="btn btn-primary">{{ isset($news->title) ? 'Edit News ' : 'Add News' }}</button>
                         
                    </div>
                </div>
                
                {!! Form::close() !!} 
            </div>
        </div>
   
    
</div>

@endsection