<!-- RIGHT COLUMN STARTS ========================================================================= -->
<div class="col-lg-4">
	<!-- JOIN NEWSLETTER STARTS -->
	<div class="newsletter-block">
		<div class="row category-caption">
			<div class="col-lg-12">
				<h2 class="pull-left">SEARCH</h2>
			</div>
		</div>
		<div class="row">
			{!! Form::open(array('url' => array('search'),'role'=>'form','method'=>'get')) !!}
		<div class="col-lg-12"><input name="q" type="text" placeholder="Search..."></div>
								 
		<div class="col-lg-12"><input type="submit" value="SEARCH"></div>
			{!! Form::close() !!} 
	</div>
</div>
	<!-- JOIN NEWSLETTER ENDS -->
	<!-- JOIN US STARTS -->
	<!--<div class="join-us">
		<div class="row category-caption">
			<div class="col-lg-12">
				<h2 class="pull-left">FOLLOW US</h2>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-12">
				<ul><li class="facebook">
					<div class="icon"><a href="{{getcong_widgets('social_facebook')}}"><i class="fa fa-facebook"></i></a></div></li>
				    <li class="twitter"><div class="icon"><a href="{{getcong_widgets('social_twitter')}}"><i class="fa fa-twitter"></i></a></div>
				    </li>
										<li class="linkedin">
											<div class="icon"><a href="{{getcong_widgets('social_linkedin')}}"><i class="fa fa-linkedin"></i></a></div>
										</li>
										<li class="dribbble">
											<div class="icon"><a href="{{getcong_widgets('social_dribbble')}}"><i class="fa fa-dribbble"></i></a></div>
										</li>
										<li class="youtube">
											<div class="icon"><a href="{{getcong_widgets('social_youtube')}}"><i class="fa fa-youtube"></i></a></div>
										</li>
										<li class="behance">
											<div class="icon"><a href="{{getcong_widgets('social_behance')}}"><i class="fa fa-behance"></i></a></div>
										</li>
										 
									</ul>
								</div>
							</div>
						</div>
-->
						<!-- JOIN US ENDS -->
						<!-- TABS STARTS -->
	<div class="tabs">
		<div role="tabpanel">
			<!-- Nav tabs -->
			<ul class="nav nav-tabs nav-justified" role="tablist">
				<li role="presentation" class="active"><a href="#popular" aria-controls="popular" role="tab" data-toggle="tab">{{getcong_widgets('popular_posts_title')}}</a></li>
				<li role="presentation">
					<a href="#categories" aria-controls="popular" role="tab" data-toggle="tab">						{{getcong_widgets('recent_posts_title')}}</a></li>
				
			</ul>
			<!-- Tab panes -->
			<div class="tab-content">
			<!-- Popular Starts -->
									<div role="tabpanel" class="tab-pane active" id="popular">
										<ul class="tabs-posts">
											@foreach(\App\News::where('status','1')->orderBy('views','desc')->take(getcong_widgets('popular_posts_limit'))->get() as $popular_news)
											
											<li>
												<div class="pic"><img src="{{ URL::asset('upload/news/'.$popular_news->image.'-s.jpg') }}" class="img-responsive" alt="" width="75" height="75" ></div>
												<div class="info">
													<span class="date"><i class="fa fa-calendar-o"></i>  {{date('m/d/Y',strtotime($popular_news->created_at))}}</span>                         
													<span class="likes pull-right"><i class="fa fa-eye"></i> {{$popular_news->views}}</span>
												</div>
												<div class="caption"><a href="{{URL::to('news/'.$popular_news->slug)}}">{{$popular_news->title}}</a></div>
											</li>
											
											@endforeach
											 
										</ul>
									</div>
									<!-- Popular Ends -->
				<!-- Categories Starts -->
				<div role="tabpanel" class="tab-pane" id="categories">
					<ul class="tabs-posts">
			@foreach(\App\News::where('status','1')->orderBy('id','desc')->take(getcong_widgets('recent_posts_limit'))->get() as $recent_news)
						<li>
							<div class="pic"><img src="{{ URL::asset('upload/news/'.$recent_news->image.'-s.jpg') }}" class="img-responsive" alt="" width="75" height="75" ></div>
							<div class="info">
								<span class="date"><i class="fa fa-calendar-o"></i>  
								{{date('m/d/Y',strtotime($recent_news->created_at))}}</span>                         
								<span class="likes pull-right"><i class="fa fa-eye"></i>
								{{$recent_news->views}}</span>
							</div>
							<div class="caption"><a href="{{URL::to('news/'.$recent_news->slug)}}">{{$recent_news->title}}</a></div>
						</li>
											
											@endforeach
											 
										</ul>
									</div>
									<!-- Categories Ends -->
									
									 
								</div>
							</div>
						</div>
						<!-- TABS ENDS -->
						<!-- FEATURED VIDEOS STARTS -->
						<div class="featured-video">
							<div class="row category-caption">
								<div class="col-lg-12">
									<h2 class="pull-left">{{getcong_widgets('featured_title')}}</h2>
								</div>
							</div>
							<div class="featured-video-carousel">
							
							@foreach(\App\News::where('featured_news','yes')->orderBy('title')->take(getcong_widgets('featured_post_limit'))->get() as $featured_news)	
								
								
								<!-- SLIDE 1 STARTS -->
							  	<div>
									<div class="picture">
										<div class="category-image">
											<img src="{{ URL::asset('upload/news/'.$featured_news->image.'-s.jpg') }}" class="img-responsive" alt="" >
											<div class="bg">&nbsp;</div>
											<h2 class="overlay-category">{{App\Categories::getCategoryInfo($featured_news->cat_id)->category_name}}</h2> 
										</div>
									</div>
									<div class="detail">
										<div class="caption"><a href="{{URL::to('news/'.$featured_news->slug)}}">{{$featured_news->title}}</a></div>
										<div class="info">
											<span class="date"><i class="fa fa-calendar-o"></i> {{date('m/d/Y',strtotime($featured_news->created_at))}}</span>                        
											<span class="likes pull-right"><i class="fa fa-eye"></i> {{$featured_news->views}}</span> 
										</div>
									</div>
								</div>
								<!-- SLIDE 1 ENDS -->
							 
							 @endforeach
							
							</div>
						</div>
						<!-- FEATURED VIDEOS ENDS --> 
						<!-- ADVERTISEMENT 300 X 250 STARTS -->
						 
						<div class="ad-300x250">												 
							@if(getcong_widgets('sidebar_advertise'))
							
							{!!getcong_widgets('sidebar_advertise')!!}
							
							@else
							<!-- ads side Start -->
							<img src="{{ URL::asset('assets/images/ads/') }}" alt="">
                            <!-- ads side End -->
							@endif
							
						</div>
						 
						<!-- ADVERTISEMENT 300 X 250 ENDS -->
						
						 
					</div>
					<!-- /. RIGHT COLUMN ENDS
						========================================================================= --> 