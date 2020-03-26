@extends("app")

@section('head_title', $news->title .' | '.getcong('site_name') )
@section('head_description', substr(strip_tags($news->description),0,200))
@section('head_image', asset('/upload/news/'.$news->image.'-b.jpg'))
@section('head_url', Request::url())

@section("content")



<!-- PAGE CONTENTS STARTS ========================================================================= -->
<br>
<ul class="via">
	<li><a href="">NOW</a></li>
	<li><a href="{{URL::to('/'.App\Categories::getCategoryInfo($news->cat_id)->category_slug)}}">{{App\Categories::getCategoryInfo($news->cat_id)->category_name}}</a></li><li><a href="">{{$news->title}}</a></li>
</ul>
			<section class="page-contents">
				<div class="row">
					@if(getcong('single_post_column')=='1cls')
						@include("_particles.sidebar")
					@endif
					<!-- LEFT COLUMN STARTS
						========================================================================= -->
					<div class="{{$big_class_name}}">
						<!-- FASHION STARTS
							========================================================================= -->
						<section>
							<div class="row category-caption">
								<div class="col-lg-12">
									<h2 class="pull-left main-caption"><a href="{{URL::to('/'.App\Categories::getCategoryInfo($news->cat_id)->category_slug)}}">{{App\Categories::getCategoryInfo($news->cat_id)->category_name}}</a></h2>
									 
								</div>
							</div>
							<div class="row">
								<article class="{{$class_name}}">
									<div class="picture">
										<div class="category-image">
											 
											<img src="{{ URL::asset('upload/news/'.$news->image.'-b.jpg') }}" alt="{{$news->image_title}}" class="img-responsive">
											@if($news->image_title)<h2 class="overlay-category">{{$news->image_title}}</h2>@endif
										</div>
									</div>
									<div class="detail">
										<div class="info">
                                            <span class="name" style="padding-right:16px;"><i class="fa fa-user"></i> {{App\User::getUserInfo($news->user_id)->name}}</span>
											<span class="date"><i class="fa fa-calendar-o"></i> {{date('m/d/Y',strtotime($news->created_at))}}</span>
                                            <span class="likes pull-right"><!--<i class="fa fa-link"></i> 
 {{$news->source}}">{{$news->source}} -->
</span>
											<span class="likes pull-right"><i class="fa fa-eye"></i> {{$news->views}} </span> 
										</div>
										<div class="caption">{{$news->title}}</div>
										<div class="author">
											<div class="pic">
<!--												<img src="{{ URL::asset('upload/members/'.App\User::getUserInfo($news->user_id)->image_icon.'-s.jpg') }}" class="img-circle" alt="{{App\User::getUserInfo($news->user_id)->name}}" width="50"> -->
												 												
											</div>
										</div>
									</div>
									<div class="description">
										
										 {!! $news->description !!}
									
									</div>
									<div class="clearfix"></div>
									<hr>
									<!-- Via, Source, Tags Starts -->
									<div>
<!--
										<ul class="via">
											<li>VIA</li>
											<li>{{App\User::getUserInfo($news->user_id)->name}}</li>
										</ul>
										<div class="clearfix"></div>
										<ul class="via">
											@if($news->source)
											 
											<li>SOURCS</li>
											<li>{{$news->source}}</li>	 
											@endif
											
										</ul>
-->
										<div class="clearfix"></div>
										<?php $tags = explode(",", $news->tags);?>
											
										 
										<ul class="via">
											@if($tags)
											<li>TAGS</li>
											@foreach($tags as $tag)
											
											<li><a href="{{URL::to('tags?tags='.$tag)}}">{{$tag}}</a></li>
											
											@endforeach
											
											@endif 
										</ul>
										<div class="clearfix"></div>
									</div>
									<!-- Via, Source, Tags Ends -->
									<hr>
									<!-- Share this post starts -->
									<div class="sharepost">
										
										<ul>
											<li>SHARE THIS NEWS</li>
											<div class="addthis_sharing_toolbox">
													<!-- Load Facebook SDK for JavaScript -->
  <div class="section">    

                  <div class="addthis_toolbox addthis_default_style">

                  <a class="addthis_button_preferred_1"></a>

                  <a class="addthis_button_preferred_2"></a>

                  <a class="addthis_button_preferred_3"></a>

                  <a class="addthis_button_preferred_4"></a>

                  <a class="addthis_button_compact"></a>

                  <a class="addthis_counter addthis_bubble_style"></a>

                  </div>

                  <script type="text/javascript" src="http://s7.addthis.com/js/250/addthis_widget.js#pubid=ra-4f8aab4674f1896a"></script>

                  </div>
				

											</div>
											
										</ul>
										<div class="clearfix"></div>
									</div>
									<!-- Share this post ends -->
									<hr>
								      
									<!-- Related Articles Starts -->
									<div class="related-articles">
										<div class="row category-caption">
											<div class="col-lg-12">
												<h2 class="pull-left">RELATED NEWS</h2>
											</div>
										</div>
										<div class="row">
											@foreach($relatednews as $i => $topnews)
											<!-- ARTICLE STARTS -->
											<article class="col-lg-6 col-md-6 col-sm-6">
												<div class="picture">
													<div class="category-image">
														<a href="{{URL::to('news/'.$topnews->slug)}}"  class="news_title_color"><img src="{{ URL::asset('upload/news/'.$topnews->image.'-s.jpg') }}" class="img-responsive" alt="" ></a>
														<h2 class="overlay-category">{{$topnews->category_name}}</h2>
													</div>
												</div>
												<div class="detail">
													<div class="info">
														<span class="date"><i class="fa fa-calendar-o"></i> {{date('m/d/Y',strtotime($topnews->created_at))}}</span>                        
														 
													</div>
													<div class="caption"><a href="{{URL::to('news/'.$topnews->slug)}}"  class="news_title_color">{{$topnews->title}}</a></div>
													<div class="author">
														<div class="pic">
															<!--<img src="{{ URL::asset('upload/members/'.App\User::getUserInfo($topnews->user_id)->image_icon.'-s.jpg') }}" class="img-circle" alt="{{App\User::getUserInfo($topnews->user_id)->name}}" width="50">--> 
															<span class="name">{{App\User::getUserInfo($topnews->user_id)->name}}</span>
																	
															<span class="read-article pull-right"><a href="{{URL::to('news/'.$topnews->slug)}}">MORE <i class="fa fa-angle-right"></i></a></span>
														</div>
													</div>
												</div>
						</article>
											<!-- ARTICLE ENDS -->
											@endforeach 
										</div>
									</div>
									<!-- Related Articles Ends -->
									<hr>
									  
									<!-- Leave a Comment Starts -->
									<div class="leave-comment">
										<div class="row category-caption">
											<div class="col-lg-12">
												<h2 class="pull-left">LEAVE A COMMENT</h2>
											</div>
										</div>
										@if(getcong('disqus_comment_code'))
										<div class="row col-lg-12 col-md-12">
											 {!! getcong('disqus_comment_code')!!}
										</div>
										@endif
										
										@if(getcong('facebook_comment_code'))
										<div class="row col-lg-12 col-md-12">
											
											 
											
											 <div class="fb-comments" data-href="{{  Request::url() }}" data-numposts="5" data-width="100%" style="width: 100%"></div>
										</div>
										@endif
									</div>
									<!-- Leave a Comment Ends -->
								</article>
							</div>
						</section>
						<!-- /. FASHION ENDS
							========================================================================= -->
					</div>
					<!-- /. LEFT COLUMN ENDS
						========================================================================= --> 
					@if(getcong('single_post_column')=='1crs')
						@include("_particles.sidebar")
					@endif
				</div>
				 
			</section>
			<!-- /. PAGE CONTENTS ENDS
				========================================================================= -->
 
@endsection