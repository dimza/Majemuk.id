@extends("admin.admin_app")

@section("content")

<div id="main">
	<div class="page-header">
		<h2> Addition</h2>
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
            <a href="#footer_widget" aria-controls="disclaimer" role="tab" data-toggle="tab">Disclaimer</a>
        </li>
        <li role="presentation">
            <a href="#followus" aria-controls="privacy" role="tab" data-toggle="tab">Privacy</a>
        </li>
        <li role="presentation">
            <a href="#recent_popular_posts" aria-controls="sitemap" role="tab" data-toggle="tab">Sitemap</a>
        </li>        
    </ul>

    <!-- Tab panes -->
    <div class="tab-content tab-content-default">
        <div role="tabpanel" class="tab-pane active" id="disclaimer">             
            {!! Form::open(array('url' => 'admin/disclaimer','class'=>'form-horizontal padding-15','name'=>'disclaimer_form','id'=>'disclaimer_form','role'=>'form','enctype' => 'multipart/form-data')) !!}
                               
                <div class="form-group">
                    <label for="" class="col-sm-3 control-label">Disclaimer Title</label>
                    <div class="col-sm-9">
                        <input type="text" name="disclaimer_title" value="{{ $addition->disclaimer_title }}" class="form-control" value="">
                    </div>
                </div>                
                <div class="form-group">
                    <label for="" class="col-sm-3 control-label">Disclaimer</label>
                    <div class="col-sm-9">
                        <textarea type="text" name="disclaimer_post" class="form-control" rows="5" placeholder="A few words about site">
                            {{ $addition->disclaimer_post }}
                        </textarea>
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

        <div role="tabpanel" class="tab-pane active" id="privacy">             
            {!! Form::open(array('url' => 'admin/privacy','class'=>'form-horizontal padding-15','name'=>'privacy_form','id'=>'privacy_form','role'=>'form','enctype' => 'multipart/form-data')) !!}
                               
                <div class="form-group">
                    <label for="" class="col-sm-3 control-label">Privacy Title</label>
                    <div class="col-sm-9">
                        <input type="text" name="privacy_title" value="{{ $addition->privacy_title }}" class="form-control" value="">
                    </div>
                </div>                
                <div class="form-group">
                    <label for="" class="col-sm-3 control-label">Privacy</label>
                    <div class="col-sm-9">
                        <textarea type="text" name="privacy_post" class="form-control" rows="5" placeholder="A few words about site">
                            {{ $addition->privacy_post }}
                        </textarea>
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

        <div role="tabpanel" class="tab-pane active" id="sitemap">             
            {!! Form::open(array('url' => 'admin/sitemap','class'=>'form-horizontal padding-15','name'=>'sitemap_form','id'=>'sitemap_form','role'=>'form','enctype' => 'multipart/form-data')) !!}
                               
                <div class="form-group">
                    <label for="" class="col-sm-3 control-label">Sitemap Title</label>
                    <div class="col-sm-9">
                        <input type="text" name="sitemap_title" value="{{ $addition->sitemap_title }}" class="form-control" value="">
                    </div>
                </div>                
                <div class="form-group">
                    <label for="" class="col-sm-3 control-label">Sitemap</label>
                    <div class="col-sm-9">
                        <textarea type="text" name="sitemap_post" class="form-control" rows="5" placeholder="A few words about site">
                            {{ $addition->sitemap_post }}
                        </textarea>
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