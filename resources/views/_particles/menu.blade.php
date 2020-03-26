<!-- MOBILE MENU BUTTON STARTS
				========================================================================= -->
			<div id="mobile-header">
				<a id="responsive-menu-button" href="#sidr-main"><span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span></a>
			</div>
			<!-- /. MOBILE MENU BUTTON ENDS
				========================================================================= -->
			<!-- NAVIGATION STARTS
				========================================================================= -->
			<nav id="navigation">
				<div class="navbar yamm navbar-inverse" role="navigation">
					<div class="row">
						<div class="col-lg-12">
							<div class="navbar-header">								
								<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse" > <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>						
							</div>
							<div class="collapse navbar-collapse">
								<ul class="nav navbar-nav">
									<li class="dropdown yamm-fw">
										<a class="dropdown-link" href="{{ URL::to('/') }}">NOW</a>
										<a class="dropdown-caret dropdown-toggle" data-hover="dropdown" > </a>
										 
									</li>
									
									@foreach(\App\Categories::orderBy('category_name')->get() as $cat)
									 
									<li class="dropdown yamm-fw">
										<a class="dropdown-link" href="{{URL::to($cat->category_slug)}}">{{$cat->category_name}}</a>
										<a class="dropdown-caret dropdown-toggle" data-hover="dropdown" ><b class="caret hidden-xs"></b></a>
										 
										<!-- Fashion Mega Menu Starts -->
										<ul class="dropdown-menu hidden-xs hidden-sm">
											<li>
												<div class="yamm-content">
													<div class="row no-gutter-3">				
														@foreach(\App\News::where('cat_id', $cat->id)->where('status', '1')->orderBy('id')->take(4)->get() as $catnews)
														<!-- ARTICLE STARTS -->
														<article class="col-lg-3 col-md-3">
															<div class="picture">
																<div class="category-image">  
																	<img src="{{ URL::asset('upload/news/'.$catnews->image.'-s.jpg') }}" alt="{{$catnews->image_title}}" class="img-responsive">
																	<h2 class="overlay-category">{{$cat->category_name}}</h2>
																</div>
															</div>
															<div class="detail">
																<div class="caption"><a href="{{URL::to('news/'.$catnews->slug)}}">{{$catnews->title}}</a></div>
															</div>
														</article>
														<!-- ARTICLE ENDS -->
														@endforeach
													</div>
												</div>
											</li>
										</ul>
										<!-- Fashion Mega Menu Ends -->
									</li>
							
									
									@endforeach
									  
								</ul>
								<!-- Search Starts -->
								<div class="nav-icon pull-right">                                    						{!! Form::open(array('url' => array('search'),'role'=>'form','method'=>'get')) !!}
									<input type="search" value="" name="q" class="s" placeholder="Search...">                 
									{!! Form::close() !!}                    
								</div>
								<!-- Search Ends -->
							</div>
							<!--/.nav-collapse --> 
						</div>
					</div>
				</div>
			</nav>
			<!-- /. NAVIGATION ENDS
				========================================================================= -->