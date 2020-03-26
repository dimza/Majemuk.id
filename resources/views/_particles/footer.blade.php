<!-- FOOTER STARTS
				========================================================================= -->
			<section class="footer">
				 
				<!-- 2ND ROW STARTS -->
				<div class="row2 container-fluid">
					<div class="row">
						<!-- ABOUT MAG STARTS -->
						<div class="col-lg-4">
							<div class="about">
								<h3>{{getcong_widgets('about_news_title')}}</h3>
								 
								<div class="introduction">{{getcong_widgets('about_news')}}</div>
							</div>
						</div>
						<!-- ABOUT MAG ENDS -->
						<!-- LIVE TWEETS STARTS -->
						<div class="col-lg-4">
							<div class="tweets">
								<h3>{{getcong_widgets('social_media_title')}}</h3>
								{!!getcong_widgets('social_media_code')!!}
							
							</div>
						</div>
						<!-- LIVE TWEETS ENDS -->
						<!-- CONTACT US STARTS -->
						<div class="col-lg-4">
							<h3>{{getcong_widgets('contact_title')}}</h3>
							<ul class="contactus">
								<li><i class="fa fa-building-o"></i> {{getcong_widgets('contact_address')}}</li>
								<li><i class="fa fa-phone"></i> {{getcong_widgets('contact_phone')}}</li>
								<li><i class="fa fa-envelope-o"></i> {{getcong_widgets('contact_email')}}</li>
							</ul>
							<!-- SOCIAL ICONS STARTS -->
							<h3>Follow Us</h3>
							<ul class="social-icons">
								<li>
									<a href="{{getcong_widgets('social_facebook')}}" target="_blank"><div class="icon facebook"><i class="fa fa-facebook"></i></div></a>
								</li>
								<li>
									<a href="{{getcong_widgets('social_twitter')}}" target="_blank"><div class="icon twitter"><i class="fa fa-twitter"></i></div></a>
								</li>
								<li>
									<a href="{{getcong_widgets('social_linkedin')}}" target="_blank"><div class="icon linkedin"><i class="fa fa-linkedin"></i></div></a>
								</li>
								<li>
									<a href="{{getcong_widgets('social_dribbble')}}" target="_blank"><div class="icon dribbble"><i class="fa fa-dribbble"></i></div></a>
								</li>
								<li>
									<a href="{{getcong_widgets('social_youtube')}}" target="_blank"><div class="icon youtube"><i class="fa fa-youtube"></i></div></a>
								</li>
								<li>
									<a href="{{getcong_widgets('social_behance')}}" target="_blank"><div class="icon behance"><i class="fa fa-behance"></i></div></a>
								</li>
							</ul>
							<!-- SOCIAL ICONS ENDS -->
						</div>
						<!-- CONTACT US ENDS -->
					</div>
				</div>
				<!-- 2ND ROW ENDS -->
				<!-- 3RD ROW STARTS -->
				<div class="row3 container-fluid">
					<div class="row">
						<div class="col-lg-12 copyright">
						@if(getcong('site_copyright'))
						
							{{getcong('site_copyright')}}
						
						@else
						
							Copyright © 2015 {{getcong('site_name')}}. All rights reserved.
						@endif
						
						</div>
					</div>
				</div>
				<!-- 3RD ROW ENDS -->
			</section>
			<!-- /. FOOTER ENDS
				========================================================================= -->