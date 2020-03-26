@extends("app")

@section('head_title', 'Page not found! | '.getcong('site_name') )

@section('head_url', Request::url())

@section("content")

<!-- PAGE CONTENTS STARTS
				========================================================================= -->
			<section class="page-contents">
				<div class="row">
					<!-- LEFT COLUMN STARTS
						========================================================================= -->
					<div class="col-lg-8">
						<!-- FASHION STARTS
							========================================================================= --> 
							 <section class="error-page">
							<div class="row">
								<div class="col-lg-12">
									<h2 class="big">404</h2>
									<div class="small">THAT PAGE DOESN’T EXIST!</div>
									 
								</div>
							</div>
						</section>
						 
						<!-- /. FASHION ENDS
							========================================================================= -->
					</div>
					<!-- /. LEFT COLUMN ENDS
						========================================================================= --> 
					@include("_particles.sidebar")
				</div>
				 
			</section>
			<!-- /. PAGE CONTENTS ENDS
				========================================================================= -->
 
@endsection
