<!DOCTYPE html>
<html lang="en">
	
<head>
		<title>@yield('head_title', getcong('site_name'))</title>
		<meta charset="utf-8">
		<!--[if IE]>
		<meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'>
		<![endif]-->
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
		
		 <meta name="description" content="@yield('head_description', getcong('site_description'))" />

    <meta property="og:type" content="article" />
    <meta property="og:title" content="@yield('head_title',  getcong('site_name'))" />
    <meta property="og:description" content="@yield('head_description', getcong('site_description'))" />
    <meta property="og:image" content="@yield('head_image', url('/upload/logo.png'))" />
    <meta property="og:url" content="@yield('head_url', url())" />	
		
		<!-- All Stylesheets -->
		<link href="{{ URL::asset('assets/css/all-stylesheets.css') }}" rel="stylesheet">
		<!-- All Colored Stylesheets -->		
	
		<link rel="alternate stylesheet" type="text/css" href="{{ URL::asset('assets/css/colors/'.getcong('site_style').'.css') }}" title="green2">
		
		
		
		<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->		
		<!-- Favicons -->
		<link rel="shortcut icon" href="{{ URL::asset('upload/'.getcong('site_favicon')) }}">
		<link rel="apple-touch-icon" href="{{ URL::asset('assets/images/icons/favicon/apple-touch-icon.png') }}">
		<link rel="apple-touch-icon" sizes="72x72" href="{{ URL::asset('assets/images/icons/favicon/apple-touch-icon-72x72.png') }}">
		<link rel="apple-touch-icon" sizes="114x114" href="{{ URL::asset('assets/images/icons/favicon/apple-touch-icon-114x114.png') }}">
	
 {!!getcong('site_header_code')!!}
	
	{!! getcong('addthis_share_code')!!} 

	
	</head>
	<body style="background-image:url({{ URL::asset('upload/'.getcong('bg_image')) }});background-repeat: repeat;background-attachment: fixed;background-position: center top;background-size: cover;">
	 <div class="container content-bg">
	 
	 	@include("_particles.header")
	 	
	 	@include("_particles.menu")
	 	
	 	@yield("content")
	 	
	 	@include("_particles.footer")
	 	
	 
	 </div>
		<!-- TO TOP STARTS
			========================================================================= -->
		<a href="#" class="scrollup">Scroll</a>      
		<!-- /. TO TOP ENDS
			========================================================================= --> 
		 
		<!-- jQuery (necessary for Bootstrap's JavaScript plugins) --> 
		<script src="{{ URL::asset('assets/js/jquery-1.11.1/jquery.min.js') }}"></script> 
		<!-- Include all compiled plugins (below), or include individual files as needed --> 
		<script src="{{ URL::asset('assets/js/bootstrap/bootstrap.min.js') }}"></script>
		<!-- Hover Dropdown Menu --> 
		<script src="{{ URL::asset('assets/js/bootstrap-hover/twitter-bootstrap-hover-dropdown.min.js') }}"></script> 
		<!-- Sidr JS Menu -->
		<script src="{{ URL::asset('assets/js/sidr/jquery.sidr.min.js') }}"></script>
		<!-- SmoothScroll --> 
		<script type="text/javascript" src="{{ URL::asset('assets/js/SmoothScroll/SmoothScroll.html') }}"></script>
        <!-- Owl Carousel --> 
		<script type="text/javascript" src="{{ URL::asset('assets/owl-carousel/owl-carousel/owl.carousel.js') }}"></script>
		<!-- AJAX Contact Form --> 			
		<script type="text/javascript" src="{{ URL::asset('assets/js/contact/contact-form.js') }}"></script>
		<!-- Style Switcher --> 
		<script type="text/javascript" src="{{ URL::asset('assets/js/styleswitcher/styleswitcher.js') }}"></script>
		<!-- Retina --> 
		<script type="text/javascript" src="{{ URL::asset('assets/js/retina/retina.js') }}"></script> 
		<!-- FitVids --> 
		<script type="text/javascript" src="{{ URL::asset('assets/js/fitvids/jquery.fitvids.js') }}"></script>
		<!-- Custom --> 
		<script type="text/javascript" src="{{ URL::asset('assets/js/custom/custom.js') }}"></script>
	
	{!!getcong('site_footer_code')!!}
	
	</body>
 
</html>	
	 	