@extends("app")

@section('head_title', $cat->category_name .' | '.getcong('site_name') )

@section('head_url', Request::url())

@section("content")

<!-- PAGE CONTENTS STARTS
				========================================================================= -->
			<section class="inner-page-contents">
				<div class="row">
					@if(getcong('category_post_columns')=='1cls' or getcong('category_post_columns')=='2cls' or getcong('category_post_columns')=='3cls')
						@include("_particles.sidebar")
					@endif
					<!-- LEFT COLUMN STARTS
						========================================================================= -->
					<div class="{{$big_class_name}}">
						<!-- FASHION STARTS
							========================================================================= -->
						<!-- LATEST ARTICLES STARTS
					========================================================================= -->  
				<section class="category">
					<div class="row category-caption">
						<div class="col-lg-12">
							<h2 class="pull-left">{{$cat->category_name}}</h2>
							 
						</div>
					</div>
					<div class="row">
						@foreach($latestnews as $i => $topnews)
						<!-- ARTICLE STARTS -->
						<article class="{{$class_name}} post_min_height">
							<div class="picture">
								<div class="category-image">
									<a href="{{URL::to('news/'.$topnews->slug)}}"  class="news_title_color">
									
										@if(getcong('category_post_columns')=='1cls' or getcong('category_post_columns')=='1crs' or getcong('category_post_columns')=='2cns')
			
										<img src="{{ URL::asset('upload/news/'.$topnews->image.'-b.jpg') }}" class="img-responsive" alt="" >
										@else
										<img src="{{ URL::asset('upload/news/'.$topnews->image.'-s.jpg') }}" class="img-responsive" alt="" >
										@endif
										
									</a>
									<h2 class="overlay-category">{{$topnews->category_name}}</h2>
								</div>
							</div>
							<div class="detail">
								<div class="info">
									<span class="date"><i class="fa fa-calendar-o"></i> {{date('m/d/Y',strtotime($topnews->created_at))}}</span>                        
									<span class="likes pull-right"><i class="fa fa-eye"></i> {{$topnews->views}}</span> 
								</div>
								<div class="caption"><a href="{{URL::to('news/'.$topnews->slug)}}"  class="news_title_color">{{$topnews->title}}</a></div>
								<div class="author">
									<div class="pic">

										<span class="name">{{App\User::getUserInfo($topnews->user_id)->name}}</span>
												
										<span class="read-article pull-right"><a href="{{URL::to('news/'.$topnews->slug)}}">MORE <i class="fa fa-angle-right"></i></a></span>
									</div>
								</div>
							</div>
						</article>
						<!-- ARTICLE ENDS -->
						@endforeach
						 
						 
					</div>
					<!-- PAGGING STARTS -->
					<div class="row pagging">
						<div class="col-lg-8 col-md-8">
							
							<!--{!! str_replace('/?', '?', $latestnews->render()) !!}-->
							@include('_particles.pagination', ['paginator' => $latestnews]) 
						</div>
					</div>
					<!-- PAGGING ENDS -->
				</section>
				<!-- /. LATEST ARTICLES ENDS
					========================================================================= --> 
						<!-- /. FASHION ENDS
							========================================================================= -->
						<hr>
						 
						 
					</div>
					<!-- /. LEFT COLUMN ENDS
						========================================================================= --> 
					@if(getcong('category_post_columns')=='1crs' or getcong('category_post_columns')=='2crs' or getcong('category_post_columns')=='3crs')
						@include("_particles.sidebar")
					@endif
				</div>
				 
			</section>
			<!-- /. PAGE CONTENTS ENDS
				========================================================================= -->
 
@endsection
