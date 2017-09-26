<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <title> Alex Davids | CV </title>
        <meta name="description" content="Description of your Site">
        <meta name="author" content="CREATEBRILLIANCE - Media &amp; Consulting">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

        <link rel="stylesheet" href="css/bootstrap.min.css">
        
        <link rel="stylesheet" href="css/font-awesome.min.css">

		<link rel="stylesheet" href="owl-carousel/owl.carousel.css">
        <link rel="stylesheet" href="owl-carousel/owl.theme.css">
 
		<link rel="stylesheet" href="css/magnific-popup.css">
		
		<link rel="stylesheet" href="css/animate.css">
		
        <link rel="stylesheet" href="css/main.css">

		<link rel="stylesheet" href="css/colorscheme-0.css">

		<link rel="stylesheet" href="css/custom.css">

		<link href='http://fonts.googleapis.com/css?family=Montserrat:400,700%7cOpen+Sans:100,200,300,400,700' rel='stylesheet' type='text/css'> 

        <script src="js/vendor/modernizr-2.6.2-respond-1.1.0.min.js"></script>
        
        <script src="http://maps.google.com/maps/api/js?sensor=false"></script>
        
        

    </head>
    
    <body>
    <!--Preloader-->	
	<div id="preloader"><div id="spinner_container"><div class="company"><div class="border">ALEX DAVIDS <img src="img/assets/spinner.gif" alt="" /></div></div></div></div>
	
	<!--<nav class="navbar navbar-custom navbar-fixed-top static-background" role="navigation">-->
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
					<li><a href="#welcome">Welcome</a></li>
					@if (SectionControls::get('offers', $user->id)->enabled)
						<li><a href="#offers">{{Section::get('offers', $user->id)->header ? Section::get('offers', $user->id)->header : 'Offers'}}</a></li>
					@endif
					@if (SectionControls::get('clients', $user->id)->enabled)
						<li><a href="#clients">{{Section::get('clients', $user->id)->header}}</a></li>
					@endif
                    @if (SectionControls::get('education', $user->id)->enabled || SectionControls::get('work', $user->id)->enabled)
						<li><a href="#cv">{{Section::get('cv', $user->id)->header}}</a></li>
					@endif
					@if (SectionControls::get('projects', $user->id)->enabled)
						<li><a href="/blog"  id="redirect">Blog</a></li>
					@endif
					@if (SectionControls::get('testimonials', $user->id)->enabled)
						<li><a href="#testimonials">{{Section::get('testimonials', $user->id)->header}}</a></li>
					@endif
					@if (SectionControls::get('awards', $user->id)->enabled)
						<li><a href="#awards">{{Section::get('awards', $user->id)->header}}</a></li>
					@endif
					<li><a href="#contact">Contact</a></li>				
				</ul>
			</div>				
		</div>			
	</nav>

	<!--main body-->
	<section id="head">	
		<div class="container">
			<div class="row">
				<div class="hero" data-start="top:0px;opacity:1" data-top-bottom="top:500px;opacity:0">
					<div class="col-sm-8 col-sm-offset-2" style="background: rgba(0,0,0,.3);">
						<h1>{{Section::get('head', $user->id)->header}}</h1>
						<div id="carousel-head" class="carousel slide carousel-fade">
							<div class="carousel-inner">
								@foreach (explode('|', Section::get('head', $user->id)->sub) as $sub)
								<div class="item">
									<h3>{{$sub}}</h3>
								</div>
								@endforeach
							</div>
						</div>
					</div>
				</div>
			</div>
		</div> 
		<div id="slides">
			<div class="slides-container">
				@foreach ($user->covers->sortBy('sort_order') as $cover)
				<img src="img/{{$cover->image}}" alt="" />
				@endforeach
			</div>
		</div>
	</section>

	<section id="welcome">	
		<img alt="" class="thumb-middle" src="img/{{$user->photo}}">			
		<div class="container">
			<div class="row">
				<div class="hero col-sm-6 col-sm-offset-3">
					<h2>{{Section::get('welcome', $user->id)->header}}</h2>
					<p>{{Section::get('welcome', $user->id)->sub}}</p>
					<div class="space"></div>
				</div>
			</div>
			<div class="row">
				<div class="hero col-sm-6 col-sm-offset-3">
					<p>{{Section::get('welcome', $user->id)->glance}}</p>
				</div>
			</div>
			<div class="row">
					<div class="col-md-6">						
						<div class="introduction-table">
							<div class="row">
								<div class="col-sm-3">
									<h4>Profile</h4>
								</div>
								<div class="col-sm-9">
									<p>{{$user->profile_title}}</p>
								</div>
								</div>
								<div class="row">
								<div class="col-sm-3">
									<h4>Social Profiles</h4>
								</div>
								<div class="col-sm-9">
									@if ($socials->facebook)
										<a href="{{$socials->facebook}}" target="_blank"><i class="fa fa-facebook fa-fw"></i></a>
									@endif
									@if ($socials->dribble)
										<a href="{{$socials->dribble}}" target="_blank"><i class="fa fa-dribbble fa-fw"></i></a>
									@endif
									@if ($socials->flickr)
										<a href="{{$socials->flickr}}" target="_blank"><i class="fa fa-flickr fa-fw"></i> </a>
									@endif
									@if ($socials->linkedin)
										<a href="{{$socials->linkedin}}" target="_blank"><i class="fa fa-linkedin fa-fw"></i> </a>
									@endif
									@if ($socials->pinterest)
										<a href="{{$socials->pinterest}}" target="_blank"><i class="fa fa-pinterest fa-fw"></i></a>
									@endif
									@if ($socials->dropbox)
										<a href="{{$socials->dropbox}}" target="_blank"><i class="fa fa-dropbox fa-fw"></i></a>
									@endif
									@if ($socials->instagram)
										<a href="{{$socials->instagram}}" target="_blank"><i class="fa fa-instagram fa-fw"></i></a>
									@endif
									@if ($socials->twitter)
										<a href="{{$socials->twitter}}" target="_blank"><i class="fa fa-twitter fa-fw"></i></a>
									@endif
									@if ($socials->google_plus)
										<a href="{{$socials->google_plus}}" target="_blank"><i class="fa fa-google-plus fa-fw"></i></a>
									@endif
								</div>
							</div>
							<div class="row">
								<div class="col-sm-3">
									<h4> {{ Section::get('skills', $user->id)->header }} </h4>
								</div>
								<div class="col-sm-8">
									@foreach ($user->skills as $skill)
									<div class="skillbar clearfix " data-percent="{{$skill->percentage}}%">
										<div class="skillbar-title" style="background:#2F3238;"><span>{{$skill->name}}</span></div>
										<div class="skillbar-bar" style="background:#2F3238;"></div>
										<div class="skill-bar-percent">{{$skill->percentage}}%</div>
									</div> <!-- End Skill Bar -->
									@endforeach
									
								</div>
							</div>
							<div class="row">
								<div class="col-sm-3">
									<h4>Contact</h4>
								</div>
								<div class="col-sm-9">
									<a href="mailto:{{$user->email}}">{{$user->email}}</a>
								</div>
							</div>
						</div>
					</div>
				
					<div class="col-md-6">
						{!!$user->introduction!!}
					</div>				
			</div>
		</div><!--container-->
	</section>

	@if ($user->philosophy)
	<section id="philosophy">
		<div class="container">
			<div class="row">
				<div class="hero col-sm-6 col-sm-offset-3">
					@if (Section::get('philosophy', $user->id)->header)
						<h2>{{Section::get('philosophy', $user->id)->header}}</h2>
					@endif
					@if (Section::get('philosophy', $user->id)->sub)
						<p>{{Section::get('philosophy', $user->id)->sub}}</p>
					@endif
					<div class="space"></div>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-12">
					{!!$user->philosophy!!}
				</div>
			</div>
		</div>
	</section>
	@endif
	
    @if (SectionControls::get('offers', $user->id)->enabled)
	<section id="offers">
		<div class="container">
			<div class="row">
				<div class="hero col-sm-6 col-sm-offset-3">
					<p>{{Section::get('offers', $user->id)->sub}}</p>
				</div>
			</div>

			<div class="offers-wrapper">
				<div class="container">
					<div class="offers-close"><span>close</span></div>
					<div class="offers-container"></div>
					<div class="arrow-up"></div>
				</div>
			</div>
				
			<?php $c = 1; ?>
			@foreach ($offersList as $offers)
			<div class="offerrs-grid row">

				<?php //$c = 1; ?>		
				@foreach ($offers as $offer)
				<div class="col-sm-4">
					<div class="feature offers-link offers-color-{{$c++}}">
						<div class="icon ">
							<i class="fa fa-{{$offer->icon}}"></i>
						</div>
						<div class="headline">
							<h3>{{$offer->title}}</h3>
						</div>
						<div class="text hidden-sm">
							<p>{{$offer->description}}</p>
						</div>
						<div class="background-icon animated" data-animation-delay="0" data-animation="fadeInLeft">
							<i class="fa fa-{{$offer->icon}}"></i>
						</div>

						<div class="offers-content">
							<h2>{{$offer->title}}</h2>
							<div class="row">
								<div class="col-md-12">
									{!!nl2br($offer->full_description)!!}
								</div>
							</div>
						</div>

					</div>
				</div>
				@endforeach
			</div><!--row-->
			@endforeach
		</div>			
	</section>
	@endif
	
	@if (SectionControls::get('clients', $user->id)->enabled)
	<section id="clients" class="no-section-padding">
		<svg preserveAspectRatio="none" viewBox="0 0 100 102" height="100" width="100%" version="1.1" xmlns="http://www.w3.org/2000/svg" class="svgcolor-light">
			<path d="M0 0 L50 100 L100 0 Z"/>
		</svg>				
		<div class="container">
			<div class="row">
				<div class="hero col-sm-6 col-sm-offset-3 section-padding">
					<h2>{{Section::get('clients', $user->id)->header}}</h2>
					<p>{{Section::get('clients', $user->id)->sub}}</p>
					<div class="space"></div>
				</div>
			</div>
			<div id="owl-carousel-clients" class="owl-carousel">
				@foreach ($user->clients()->get() as $client)
				<div class="owl-container text-center">
					<div class="img-client-container animated" data-animation-delay="200" data-animation="fadeInUp">
						<a href="" onclick="return false;" data-client-id="{{$client->id}}">
							<img src="img/{{$client->image}}" class="img-responsive" alt="" />
						</a>
					</div>
					<h5>{{$client->name}}</h5>
				</div>
				@endforeach
			</div><!--carousel-->
		</div>
	</section>
	@endif
	
	@if (SectionControls::get('education', $user->id)->enabled || SectionControls::get('work', $user->id)->enabled)
	<section id="cv">
		<div class="container">
			<div class="row">
				<div class="hero col-sm-6 col-sm-offset-3">
					<h2>{{Section::get('cv', $user->id)->header}}</h2>
					<p>{{Section::get('cv', $user->id)->sub}}</p>
					<div class="space"></div>
				</div>
			</div>
			@if ($user->experience)
				<div class="row">
					<div class="hero experience col-sm-12">
						{!!$user->experience!!}
						<div class="space"></div>
					</div>
				</div>
			@endif
		</div>
		<div class="container">
			<div class="cv-wrapper">
				@if ($user->education && SectionControls::get('education', $user->id)->enabled)
				<div class="row cv">
					<div class="col-lg-3 title">
						<h3 class="headline-inline">EDUCATION</h3>
					</div>
					@foreach ($user->education as $education)
					<div class="cv-entry animated" data-animation-delay="100" data-animation="fadeInLeft">
						<div class="col-lg-6 col-lg-offset-3 main education-row">
							<h4>{{$education->title}}</h4>
							<i class="fa fa-building-o"></i> {{$education->school}} <small>({{$education->type}})</small>

							<p class="desc">
								{{$education->description}}
							</p>
							<hr>
						</div>
						<div class="col-lg-3 date">
							<p>
								<small><i class="fa fa-calendar-o"></i> {{$education->graduation->format('F Y')}}</small>
							</p>
						</div>
					</div>
					@endforeach
				</div>
				@endif
				
				@if ($user->work && SectionControls::get('work', $user->id)->enabled)
				<div class="row cv">
					@foreach ($user->work as $work)
					<div class="cv-entry animated" data-animation-delay="100" data-animation="fadeInLeft">
						<div class="col-lg-12 main work-row">
							<h4>{{$work->title}}</h4>
							<i class="fa fa-building-o"></i> {{$work->company}}

							<p class="desc">
								{{$work->description}}
							</p>
							<hr>
						</div>
					</div>
					@endforeach
				</div>
				@endif
				
			</div><!--cv wrapper-->

			<!-- <p>
				<a href="#" class="btn btn-default btn-large"><i class="fa fa-download"></i> Download my CV</a>
			</p> -->
		</div>
	</section>
	@endif
			
	<section class="callToAction">			
		<div class="container animated" data-animation-delay="200" data-animation="rubberBand">
			<h2>{{Section::get('callToAction', $user->id)->header}}</h2>
			<button class="btn btn-default btn-lg btn-toWhite"  onclick="$.scrollTo( '#contact', 800, {easing:'easeOutExpo', axis:'y'} );"><i class="fa fa-check"></i> {{Section::get('callToAction', $user->id)->sub}}</button>
		</div>
	</section>

	<!-- @if (SectionControls::get('projects', $user->id)->enabled)
	<section id="portfolio">
		<div class="container">
			<div class="row">
				<div class="hero col-sm-6 col-sm-offset-3">
					<h2>{{Section::get('portfolio', $user->id)->header}}</h2>
					<p>{{Section::get('portfolio', $user->id)->sub}}</p>
					<div class="space"></div>
				</div>
			</div>
			<div class="filter text-center">
				@foreach ($categories as $category)
				<a href="#" data-group="{{strtolower($category->name)}}">{{$category->name}}</a>
				@endforeach
				<a href="#" data-group="all" class="current">All</a>
			</div>
			
		</div>

		<div class="portfolio-wrapper">
			<div class="container">
				<div class="portfolio-close"><span>close</span></div>
				<div class="portfolio-container"></div>
				<div class="arrow-up"></div>
			</div>
		</div>
		
		<div class="portfolio-grid row">
			@foreach ($user->projects as $project)
			<div class="col-sm-4" data-group="{{strtolower($project->categories)}}">
				<div class="portfolio-link">
					<div class="portfolio-hover">
						<div class="img"><img src="img/{{$project->image}}" alt=""></div>
						<div class="info dark">
							<h2>{{$project->title}}</h2>
							<p>{{str_replace(',', ' | ', $project->categories)}}</p>
						</div>
					</div>

					<div class="portfolio-content">
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
					</div>
				</div>
			</div>
			@endforeach
			
		</div>	
	</section>
	@endif
	 -->
	@if (SectionControls::get('testimonials', $user->id)->enabled)
	<section id="testimonials" class="testimonials">
		<div class="container">
			<div class="row">
				<div class="hero col-sm-6 col-sm-offset-3">
					<h2>{{Section::get('testimonials', $user->id)->header}}</h2>
					<p>{{Section::get('testimonials', $user->id)->sub}}</p>
					<div class="space"></div>
				</div>
			</div>
				<div class="col-md-10 col-md-offset-1">
					<div id="owl-carousel-testimonial" class="owl-carousel">
						@foreach ($user->testimonials as $testimonial)
						<div class="img-testimonial-container animated" data-animation-delay="400" data-animation="fadeInUp">
							<img src="img/{{$testimonial->photo}}" class="img-responsive img-circle" alt="" />
							<p>
								{{$testimonial->text}}
							</p>
							<cite title="Source Title" class="text-mute">{{$testimonial->author}}</cite>
						</div>
						@endforeach
					</div><!--carousel-->
				</div>
			</div>
	</section>
	@endif
	
	@if (SectionControls::get('awards', $user->id)->enabled)
	<section id="awards">
		<div class="container">
		<div class="row">
			<div class="hero col-sm-6 col-sm-offset-3">
				<h2>{{Section::get('awards', $user->id)->header}}</h2>
				<p>{{Section::get('awards', $user->id)->sub}}</p>
				<div class="space"></div>
			</div>
		</div>
			<div class="row">
				@foreach ($user->awards as $award)
				<div class="col-md-4 col-sm-6 info-box animated" data-animation-delay="100" data-animation="fadeIn">
					<div class="icon">
						<i class="fa fa-{{$award->icon}} icon-effect"></i>
					</div>
					<div class="content">
						<h3>{{$award->title}}</h3>
						<p>
							{{$award->description}}
						</p>
						<small class="text-muted">Received: {{$award->date ? $award->date->format('F jS Y') : 'NA'}}</small>
					</div>
				</div>
				@endforeach
			</div><!--row-->
		</div>
	</section>
	@endif

	<section id="contact" class="no-section-padding">
		<svg preserveAspectRatio="none" viewBox="0 0 100 102" height="100" width="100%" version="1.1" xmlns="http://www.w3.org/2000/svg" class="svgcolor-light">
			<path d="M0 0 L50 100 L100 0 Z"/>
		</svg>
		<div class="container text-center">
			<div class="row section-padding">
				<div class="hero">
						<h2>{{Section::get('contact', $user->id)->header}}</h2>
						<p>{{Section::get('contact', $user->id)->sub}}</p>
				</div>
				<div class="col-sm-6 col-sm-offset-3 animated" data-animation-delay="300" data-animation="fadeInLeft">
					<h2>{{$user->name . ' ' . $user->lastname}}</h2>
					<address>						
						{!!nl2br($user->address)!!}
						<br>
						<abbr title="Phone">P:</abbr> {{$user->phone}}
						<br>
						<a href="mailto:{{$user->email}}">{{$user->email}}</a>
					</address>
					<div class="background-icon left animated" data-animation-delay="400" data-animation="fadeInRight">
						<i class="fa fa-envelope-o"></i>
					</div>
				</div>
				<div class="col-sm-6 col-sm-offset-3 animated" data-animation-delay="600" data-animation="fadeInRight">
					{!!Form::open(['class' => 'contact-form', 'id' => 'contact-form', 'role' => 'form'])!!}
						<div class="form-group">
							<label class="sr-only" for="inputName">Name</label>
							<input type="text" placeholder="Name" name="name" id="inputName" class="form-control">
						</div>

						<div class="form-group">
							<label class="sr-only" for="inputEmail">Email address</label>
							<input type="email" placeholder="Enter email" name="email" id="inputEmail" class="form-control">
						</div>

						<div class="form-group">
							<label class="sr-only" for="inputMessage">Message</label>
							<textarea placeholder="Your Message" name="message" rows="5" id="inputMessage" class="form-control"></textarea>
						</div>
						<div class="pull-right">
							<p><button id="contact-submit" class="btn btn-default btn-submit" type="submit"><i class="fa fa-check"></i> Submit</button></p>
						</div>
						<div class="clearfix"></div>
						<div id="contact-form-response"></div>
					{!!Form::close()!!}
				</div>
			</div><!--row-->
			
				<div class="social-icons">
					@if ($socials->facebook)
					<a href="{{$socials->facebook}}" target="_blank" class="facebook"><i class="fa fa-facebook"></i></a>
					@endif
					@if ($socials->flickr)
					<a href="{{$socials->flickr}}" target="_blank" class="flickr"><i class="fa fa-flickr"></i> </a>
					@endif
					@if ($socials->linkedin)
					<a href="{{$socials->linkedin}}" target="_blank" class="linkedin"><i class="fa fa-linkedin"></i> </a>
					@endif
					@if ($socials->pinterest)
					<a href="{{$socials->pinterest}}" target="_blank" class="pinterest"><i class="fa fa-pinterest"></i> </a>
					@endif
					@if ($socials->dribble)
					<a href="{{$socials->dribble}}" target="_blank" class="dribbble"><i class="fa fa-dribbble"></i> </a>
					@endif
					@if ($socials->dropbox)
					<a href="{{$socials->dropbox}}" target="_blank" class="dropbox"><i class="fa fa-dropbox"></i> </a>
					@endif
					@if ($socials->instagram)
					<a href="{{$socials->instagram}}" target="_blank" class="instagram"><i class="fa fa-instagram"></i> </a>
					@endif
					@if ($socials->twitter)
					<a href="{{$socials->twitter}}" target="_blank" class="twitter"><i class="fa fa-twitter"></i> </a>
					@endif
					@if ($socials->google_plus)
					<a href="{{$socials->google_plus}}" target="_blank" class="google-plus"><i class="fa fa-google-plus"></i> </a>
					@endif
				</div>
				<div class="clearfix"></div>
			
		</div><!--container-->		
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

  		<script type="text/javascript" src="js/vendor/jquery-1.10.1.min.js"></script>
		<script type="text/javascript" src="js/vendor/bootstrap.min.js"></script>
		<script type="text/javascript" src="js/plugins.js"></script>
		<script type="text/javascript" src="owl-carousel/owl.carousel.min.js"></script>
		<script type="text/javascript" src="js/main.js"></script>

		<script>
			$(document).ready(function(){	

				// Temporary code to redirect to the url /portfolio (No scrolling)
				var redirect = $('#redirect');

				redirect.on('click', function(e) {
					var url = redirect.attr('href');
					console.log(url);
					window.location.replace(url);
				});

				SLAMR.preloader();		
				SLAMR.nav();	
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
