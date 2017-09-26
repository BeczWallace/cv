<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
	    <title>Blog</title>
	    <meta name="description" content="Alex Davids Blog">
	    <meta name="author" content="AlexDavids.com Alex Davids Blog">
	    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

	    <link rel="stylesheet" href="/css/bootstrap.min.css">
	    
	    <link rel="stylesheet" href="/css/font-awesome.min.css">

		<link rel="stylesheet" href="/owl-carousel/owl.carousel.css">
	    <link rel="stylesheet" href="/owl-carousel/owl.theme.css">

		<link rel="stylesheet" href="/css/magnific-popup.css">
		
		<link rel="stylesheet" href="/css/animate.css">
		
	    <link rel="stylesheet" href="/css/main.css">

		<link rel="stylesheet" href="/css/colorscheme-0.css">

		<link rel="stylesheet" href="/css/custom.css">

		<link href='http://fonts.googleapis.com/css?family=Montserrat:400,700%7cOpen+Sans:100,200,300,400,700' rel='stylesheet' type='text/css'> 

	    <script src="/js/vendor/modernizr-2.6.2-respond-1.1.0.min.js"></script>
	    
	    <script src="http://maps.google.com/maps/api/js?sensor=false"></script>

	    <style type="text/css">
	    .navbar {
		    background: rgba(70, 130, 180, .8);
		}
		section {
			display: block;
			min-height: 100%;
		}
	    </style>
		
	</head>
	<body>
		<!--Preloader-->	
		<!-- <div id="preloader"><div id="spinner_container"><div class="company"><div class="border">ALEX DAVIDS <img src="img/assets/spinner.gif" alt="" /></div></div></div></div> -->

		<nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
			<div class="container">
				<div class="navbar-header page-scroll">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-main-collapse">
						<i class="fa fa-bars"></i>
					</button>
				<div class="company"><div class="border">ALEX DAVIDS</div></div>
				</div>
				<div class="collapse navbar-collapse navbar-right navbar-main-collapse">
					<ul class="nav navbar-nav">				
						<li><a href="/">Home</a></li>
						<li><a href="/blog">Blog</a></li>
					</ul>
				</div>				
			</div>			
		</nav>

		

		<section>
			<div class="container">
				<h2>{{$project->title}}</h2>
				<div class="row">
					<div class="col-md-8">
						@if ($project->img1)
						<div id="carousel-port" class="owl-carousel owl-portfolio">
							<div class="item">
								<img class="lazyOwl img-responsive" data-src="img/{{$project->img1}}" src="#" alt="" />
							</div>
							@if ($project->img2)
							<div class="item">
								<img class="lazyOwl img-responsive" data-src="img/{{$project->img2}}" src="#" alt="" />
							</div>
							@endif
							@if ($project->img3)
							<div class="item">
								<img class="lazyOwl img-responsive" data-src="img/{{$project->img3}}" src="#" alt="" />
							</div>
							@endif
						</div>
						@endif
						<div class="description">
							<p>
								{!!$project->description!!}
							</p>
						</div>
					</div>
					<div class="col-md-4">
						@if ($project->client)
						<div class="client">
							<h5>CLIENT NAME</h5>
							<p>
								{{$project->client}}
							</p>
						</div>
						@endif
						@if ($project->date_start || $project->date_end)
						<div class="date">
							<h5>TIMEFRAME</h5>
							<p>
								{{$project->date_start ? $project->date_start->format('F Y') : ''}} {{$project->date_start && $project->date_end ? '-' : ''}} {{$project->date_end ? $project->date_end->format('F Y') : ''}}
							</p>
						</div>
						@endif
						@if ($project->url)
						<div class="url">
							<h5>URL</h5>
							<p>
								<a href="{{$project->url}}">{{$project->url}}</a>
							</p>
						</div>
						@endif
						@if ($project->tags)
						<div class="tags">
							<h5>TAGS</h5>
							<p>
								@foreach (explode(',', $project->tags) as $tag)
								<span class="tagIcon">{{$tag}}</span>
								@endforeach
							</p>
						</div>
						@endif
					</div>
				</div>
						
				
			
			</div><!--/.container-->
		</section>

		<!--footer-->
		<footer>
		<div class="container text-center">
			<div class="row">
				<div class="col-md-12">
					<p class="copy">
						<strong>ALEX DAVIDS</strong> 2015 | Created by  <a href="http://www.superlogical.org" target="_blank"> SuperLogical.org - Websites and Apps </a>

					</p>
				</div>
			</div>
		</div>
		</footer>

  		<script type="text/javascript" src="/js/vendor/jquery-1.10.1.min.js"></script>
		<script type="text/javascript" src="/js/vendor/bootstrap.min.js"></script>
		<script type="text/javascript" src="/js/plugins.js"></script>
		<script type="text/javascript" src="/owl-carousel/owl.carousel.min.js"></script>
		<script type="text/javascript" src="/js/main.js"></script>

		<script>
			$(document).ready(function(){		
				SLAMR.preloader();		
				// SLAMR.nav();	
				SLAMR.parallax(true);							
				SLAMR.slider("#slides", {'play':5000, 'animation': 'fade'});				
				SLAMR.skillbar("animated");	
				SLAMR.slideDownHead(true);			
				SLAMR.scrollAnim("yes");							
				SLAMR.owlCarousel({
				'#owl-carousel-blog':{singleItem : true,
						lazyLoad:true,
						autoPlay : true},
				'#owl-carousel-clients':{navigation: true,
				navigationText: [
      				"<i class='fa fa-angle-left arrow-round'></i>",
      				"<i class='fa fa-angle-right arrow-round'></i>"
      			]},
      			'#owl-carousel-testimonial':{singleItem:true,transitionStyle: "goDown",navigation: true,
				navigationText: [
      				"<i class='fa fa-angle-left arrow-round'></i>",
      				"<i class='fa fa-angle-right arrow-round'></i>"
      			]}, 
				});	
				SLAMR.bootstrapCarousel({
				'#carousel-head':{interval:5000,pause:false}
				});	
				SLAMR.contactForm();
				SLAMR.fitVids(".video-container");
				
				SLAMR.magnific({
					'.image-modal':{type:'image',image: { 
						markup: '<div class="mfp-figure">'+
						            '<div class="mfp-close"></div>'+
						            '<div class="mfp-img"></div>'+
						            '<div class="mfp-bottom-bar">'+
						              '<div class="mfp-title"></div>'+
						              '<div class="mfp-counter"></div>'+
						            '</div>'+
						          '</div>',												  
						  titleSrc: 'title',verticalFit: true,tError: '<a href="%url%">The image</a> could not be loaded.'
					},closeBtnInside:true,midClick: true,fixedContentPos:false,preloader:true,gallery:{ enabled:true},removalDelay: 0,mainClass: 'mfp-fade'}});
				
				SLAMR.portfolioFilter("#portfolio .filter a", "#portfolio .portfolio-grid div");
				SLAMR.portfolio(".portfolio-link",{
					"pWrapper"	: ".portfolio-wrapper",
		            "section"	: "#portfolio",
		            "pContent"	: ".portfolio-content",
		            "pContainer": ".portfolio-container",
		            "close"		: ".portfolio-close",
		            "carousel"	: ".owl-portfolio"
		      	});
		      	$('#carousel-head').children('.carousel-inner').children('.item').first().addClass('active');
		      	$('.education-row').first().removeClass('col-lg-offset-3');
		      	$('.work-row').first().removeClass('col-lg-offset-3');
		      	SLAMR.portfolio(".offers-link",{
					"pWrapper"	: ".offers-wrapper",
		            "section"	: "#offers",
		            "pContent"	: ".offers-content",
		            "pContainer": ".offers-container",
		            "close"		: ".offers-close",
		            "carousel"	: ".owl-offers"
		      	});
			}); //document ready
		</script>


	</body>
</html>