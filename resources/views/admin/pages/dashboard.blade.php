@extends("admin.admin_app")

@section("content")

<div id="main">
	<div class="page-header">
		<h2>Overview</h2>
	</div>
    
 
<div class="row">
    
  	@if(Auth::user()->usertype=='Admin')
    	
    	<a href="{{ URL::to('admin/categories') }}">
    	<div class="col-sm-6 col-md-3">
        <div class="panel panel-orange panel-shadow">
            <div class="media">
                <div class="media-left">
                    <div class="panel-body">
                        <div class="width-100">
                            <h5 class="margin-none" id="graphWeek-y">Categories</h5>

                            <h2 class="margin-none" id="graphWeek-a">
                                {{$categories_count}}
                            </h2>
                        </div>
                    </div>
                </div>
                <div class="media-body">
                    <div class="pull-right width-150">
                        <i class="fa fa-folder fa-4x" style="margin: 8px;"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </a>
    @endif
    
    <a href="{{ URL::to('admin/news') }}">
    <div class="col-sm-6 col-md-3">
        <div class="panel panel-primary panel-shadow">
            <div class="media">
                <div class="media-left">
                    <div class="panel-body">
                        <div class="width-100">
                            <h5 class="margin-none" id="graphWeek-y">Total News</h5>

                            <h2 class="margin-none" id="graphWeek-a">
                                {{$news_count}}
                            </h2>
                        </div>
                    </div>
                </div>
                <div class="media-body">
                    <div class="pull-right width-150">
                        <i class="fa fa-file-text fa-4x" style="margin: 8px;"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
   	</a>
   	
   	<a href="{{ URL::to('admin/news') }}">
   	<div class="col-sm-6 col-md-3">
        <div class="panel panel-green panel-shadow">
            <div class="media">
                <div class="media-left">
                    <div class="panel-body">
                        <div class="width-100">
                            <h5 class="margin-none" id="graphWeek-y">Published</h5>

                            <h2 class="margin-none" id="graphWeek-a">
                                {{$published_news}}
                            </h2>
                        </div>
                    </div>
                </div>
                <div class="media-body">
                    <div class="pull-right width-150">
                        <i class="fa fa-file-text fa-4x" style="margin: 8px;"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>  
    </a>
    
    <a href="{{ URL::to('admin/news') }}">
    <div class="col-sm-6 col-md-3">
        <div class="panel panel-grey panel-shadow">
            <div class="media">
                <div class="media-left">
                    <div class="panel-body">
                        <div class="width-100">
                            <h5 class="margin-none" id="graphWeek-y">Unpublished</h5>

                            <h2 class="margin-none" id="graphWeek-a">
                                {{$unpublished_news}}
                            </h2>
                        </div>
                    </div>
                </div>
                <div class="media-body">
                    <div class="pull-right width-150">
                        <i class="fa fa-file-text fa-4x" style="margin: 8px;"></i>
                    </div>
                </div>
            </div>
        </div>
    </div> 
	</a>
	
	@if(Auth::user()->usertype=='Admin')
	
	<a href="{{ URL::to('admin/slidernews') }}">
	<div class="col-sm-6 col-md-3">
        <div class="panel panel-default panel-shadow">
            <div class="media">
                <div class="media-left">
                    <div class="panel-body">
                        <div class="width-100">
                            <h5 class="margin-none" id="graphWeek-y">Home Slider</h5>

                            <h2 class="margin-none" id="graphWeek-a">
                                {{$slider_news}}
                            </h2>
                        </div>
                    </div>
                </div>
                <div class="media-body">
                    <div class="pull-right width-150">
                        <i class="fa fa-sliders fa-4x" style="margin: 8px;"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
	</a>
	
	<a href="{{ URL::to('admin/featurednews') }}">
	<div class="col-sm-6 col-md-3">
        <div class="panel panel-grey panel-shadow">
            <div class="media">
                <div class="media-left">
                    <div class="panel-body">
                        <div class="width-100">
                            <h5 class="margin-none" id="graphWeek-y">Featured</h5>

                            <h2 class="margin-none" id="graphWeek-a">
                                {{$featured_news}}
                            </h2>
                        </div>
                    </div>
                </div>
                <div class="media-body">
                    <div class="pull-right width-150">
                        <i class="fa fa-heart fa-4x" style="margin: 8px;"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </a>
    
    <a href="{{ URL::to('admin/users') }}">
    <div class="col-sm-6 col-md-3">
        <div class="panel panel-purple panel-shadow">
            <div class="media">
                <div class="media-left">
                    <div class="panel-body">
                        <div class="width-100">
                            <h5 class="margin-none" id="graphWeek-y">Editors</h5>

                            <h2 class="margin-none" id="graphWeek-a">
                                {{$editor}}
                            </h2>
                        </div>
                    </div>
                </div>
                <div class="media-body">
                    <div class="pull-right width-150">
                        <i class="fa fa-users fa-4x" style="margin: 8px;"></i>
                    </div>
                </div>
            </div>
        </div>
    </div> 
	</a>
	
	@endif
</div>
 
</div>

@endsection