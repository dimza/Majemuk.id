	<!-- NEWS STARTS
				========================================================================= -->
			<section class="breaking-news">
				<div class="row">
					<div class="col-lg-1 col-md-1">
						<h2 class="title">News</h2>
					</div>
					<div class="col-lg-11 col-md-11">
						<div class="newsticker">
							@foreach($newsticker as $i => $ticker)
							
							<div><a href="{{URL::to('news/'.$ticker->slug)}}">{{$ticker->title}}</a></div>
							
							@endforeach
							
						</div>
					</div>
				</div>
			</section>
			<!-- /. NEWS ENDS
				========================================================================= -->
			<!-- SLIDER STARTS
				========================================================================= -->
			<section>
				 <div class="row slider">
					<!-- Slide 1 Starts -->
					 		 
					  @foreach(array_chunk($slidernews, 3) as $row)
					  	<div>
						
							@foreach($row as $i => $slider)
								@if($i==0)
								<div class="col-lg-8">
									<div class="pic-with-overlay-2">
										<img src="{{ URL::asset('upload/news/'.$slider->image.'-b.jpg') }}" class="img-responsive" alt="" >
										<div class="bg">&nbsp;</div>
										<div><span class="category">{{$slider->category_name}}</span></div>
										<h1><a href="{{URL::to('news/'.$slider->slug)}}">{{$slider->title}}</a></h1>
										<div class="author">by {{$slider->name}}</div>
									</div>
								</div>
								@else
								<div class="col-lg-4">
									<div class="pic-with-overlay-2">
										<img src="{{ URL::asset('upload/news/'.$slider->image.'-b.jpg') }}" class="img-responsive" alt="" >
										<div class="bg">&nbsp;</div>
										<div><span class="category">{{$slider->category_name}}</span></div>
										<h1><a href="{{URL::to('news/'.$slider->slug)}}">{{$slider->title}}</a></h1>
										<div class="author">by {{$slider->name}}</div>
									</div>
								</div>
								@endif
							 @endforeach
						  
						 </div>	 
					  @endforeach
					<!-- Slide 1 Ends -->
					  
					
					 
				</div>
			</section>
			<!-- /. SLIDER ENDS
				========================================================================= --> 