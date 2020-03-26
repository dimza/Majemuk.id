<!-- HEADER STARTS ========================================================================= -->
			<header>
				<!-- TOP ROW STARTS -->
				<div class="top-nav hidden-sm hidden-xs">
					<div class="row">
                        <?PHP   date_default_timezone_set('Asia/Jakarta');

                                $hari_ini = date('l, jS \of F Y'); ?>
						<div class="col-lg-6 col-md-6">
                            <!--<div id="date"></div>-->
                            <p><?PHP echo $hari_ini; ?></p>
						</div>
						<div class="col-lg-6 col-md-6 text-right">
						<p>
						<a style="margin-left:10px;margin-right:10px;">Privacy</a> | 
						<a style="margin-left:10px;margin-right:10px;">Disclaimer</a> | 
						<a style="margin-left:10px;margin-right:10px;">Sitemap</a> </p>	 
						</div>
					</div>
				</div>
				<!-- TOP ROW ENDS -->
				<!-- LOGO & ADS STARTS -->
				<div class="row">
					<div class="col-lg-4 col-md-2 logo"><a href="{{ URL::to('/') }}"><img src="{{ URL::asset('upload/'.getcong('site_logo')) }}" alt=""></a></div>
					<div class="col-lg-8 col-md-10">
						<div class="ad-728x90 visible-lg visible-md">
							
							@if(getcong_widgets('header_advertise'))
							{!!getcong_widgets('header_advertise')!!}
							
							@else
							<!-- ads top Start -->
							<img src="{{ URL::asset('assets/images/ads/') }}" alt="">
                            <!-- ads top End -->
							@endif
							 
							
						</div>						 
						
					</div>
				</div>
				<!-- LOGO & ADS ENDS -->
				
		
				
			</header>
			<!-- /. HEADER ENDS
				========================================================================= -->
