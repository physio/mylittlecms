<!DOCTYPE html>
<!--[if IE 8]><html class="no-js lt-ie9" lang="en"><![endif]-->
<!--[if gt IE 8]><!--><html class="no-js" lang="en"><!--<![endif]-->
<head>

	<meta charset="utf-8" />

		<!-- Always force latest IE rendering engine (even in intranet) & Chrome Frame
		Remove this if you use the .htaccess -->
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

		<title>{{ $title }} - {{ config('app.name') }}</title>
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=5" />

		<link href='http://fonts.googleapis.com/css?family=Raleway:300,700|Open+Sans:300,400' rel='stylesheet' type='text/css'>
		<link href="/css/reset.css" rel="stylesheet">
		<link href="/css/foundation.css" rel="stylesheet">
		<link href="/css/ionicons.css" rel="stylesheet">
		<link href="/css/jquery.fancybox.css" rel="stylesheet">
		<link href="/css/fancybox/helpers/jquery.fancybox-thumbs.css" rel="stylesheet">
		<link href="/css/isotope.css" rel="stylesheet">
		<link href="/css/flexslider.css" rel="stylesheet">
		<link href="/css/validationEngine.jquery.css" rel="stylesheet">
		<link href="rs-plugin//css/settings.css" rel="stylesheet" media="screen" />
		<link href="/css/thine.css" rel="stylesheet">
		<link href="/css/thine-responsive.css" rel="stylesheet">

		<!-- Some JS that need to be loaded in this head section -->
		<script src="/js/custom.modernizr.js"></script>

		<!-- Favicons -->
		<link rel="shortcut icon" href="/images/favicon.png" />
		<link rel="apple-touch-icon" href="/images/apple-touch-icon.png" />

	</head>

	<body class="bg-set">

		<!-- Root Container -->
		<div id="root-container">

			<!-- Header Container -->
			<div id="header-container" class="main-width">

				<!-- Logo and Tagline -->
				<div id="logo-wrapper">
					<a href="/" class="bg-set"><img src="/images/logo-ancisa.png" alt="Ancisa Il partner delle pubbliche amministrazioni" title="Ancisa Il partner delle pubbliche amministrazioni" /></a>
				</div>
				<div id="tagline" class="bg-set">
					Il partner delle pubbliche amministrazioni
				</div>

				<!-- Header Image Slider -->
				<div id="header-slider-container" class="show-arrows-nav slider-fixed-height">
					<div id="header-slider">
						<ul>
							@foreach ($slides as $slide)
							<li data-transition="fade" data-masterspeed="500">
								<img src="/{{ $slide->image }}" alt="{{ $slide->title }}"
								data-kenburns="on"
								data-bgposition="left top"
								data-bgpositionend="left bottom"
								data-bgfit="100"
								data-bgfitend="100"
								data-duration="8000"
								data-ease="Power4.easeOutQuint"
								/>
							</li>
							@endforeach
						</ul>
					</div>
				</div>

				@include('includes.topmenu')


			</div>
			<!-- End id="header-container" -->

			<hr class="line-style" />

			<div id="content-container">

				<hr id="dynamic-side-line" class="line-style" />

				<div id="inner-content-container" class="main-width">

					<!-- Page Intro -->
					<div id="intro-wrapper">
						<h1 id="intro-title">Benvenuto nel sito Anci Sa</h1>
						<p id="intro-body">
							Amministrare per noi, significa conoscere e organizzare, per poter pensare e agire.
						</p>
					</div>
					<!-- End id="intro-wrapper" -->

					<div id="content-wrapper">

						<div class="row">
							<div class="large-12 columns">
								<div class="image-element">
									<img src="/images/banner_ancisa_controllata.jpg" alt="" />
									<div class="image-caption-wrapper">
										<div class="image-caption">
											Benvenuto nel sito di Anci Sa
										</div>
									</div>
								</div>
								<h2>Anci Sa s.r.l. - <span>Il Partner delle Pubbliche Amministrazioni</span></h2>
								<p>
									Anci Sa è da oltre 20 anni il Partner per eccellenza delle Pubbliche Amministrazioni.
								</p>
								<p>
									Come Società di Servizi di Anci Veneto e Anci Friuli Venezia-Giulia, lavoriamo a stretto contatto con gli Enti Locali per fornire soluzioni all'avanguardia, studiate appositamente per i Comuni a cui sono rivolte, e adattate alle realtà del territorio.
								</p>
								<p>
									Siamo sempre alla ricerca di nuove proposte e di continui miglioramenti, per poter dare ogni giorno il miglior contributo ai Nostri migliori clienti...
								</p>
								<p>
									<b>Angelo Tosoni</b>, Presidente | <b>Elisa Venturini</b>, Consigliere | <b>Enzo Muoio</b>, Amm. Delegato
								</p>
							</div>
						</div>

						<div class="row">
							@foreach ($articles as $article)
							<div class="large-4 columns">
								<div class="image-element">
									<a href="/notizie/dettaglio/{{ $article->slug }}" class="image-link black-white">
										<img src="/{{ $article->image }}" alt="" />
										<div class="image-hover-icon bg-set">
											<i class="icon ion-link"></i>
										</div>
										<div class="image-hover-border"></div>
									</a>
								</div>
								<h3>{{ $article->title }}</h3>
								<p>
									{!! strip_tags(str_limit($article->content, $limit = 150, $end = '...'))  !!}
								</p>
								<a href="/notizie/dettaglio/{{ $article->slug }}" class="button"><i class="icon ion-document-text"></i>Leggi Tutto</a>
							</div>
							@endforeach
						</div>

						<div class="row">
							<div class="large-12 columns">
								<h2>Ultimi Convegni</h2>
								<p>
									Di seguito sono disponibili gli utimi convegni organizzati da Anci Sa.

									E' possibile inoltre seguire l'elenco completo dei convegni:  <a href="/eventi/elenco/tutti">tramite questo link. <i class="icon ion-ios7-arrow-thin-right"></i></a>
								</p>
								<div class="uxb-port-root-element-wrapper col4">
									<span class="uxb-port-loading-text"><span>sto caricando</span></span>

									<div class="uxb-port-loaded-element-wrapper">

										<div class="uxb-port-element-wrapper">
											@forelse ($events as $event)
											<div class="uxb-port-element-item black-white vehicle">
												<a href="/eventi/dettaglio/{{ $event->slug }}"></a>
												<div class="uxb-port-element-item-hover">
													<div class="uxb-port-element-item-hover-info">
														<h4 class="portfolio-item-title">{{ $event->title }}</h4>
													</div>
												</div>
												<img src="/{{ $event->image }}" alt="" />
												<div class="image-hover-icon bg-set">
													<i class="icon ion-link"></i>
												</div>
											</div>
											@empty
											<p>Nessun evento programmato.</p>
											@endforelse

										</div>

									</div>
								</div>
								<!-- End class="uxb-port-root-element-wrapper" -->

							</div>
						</div>

					</div>
					<!-- End id="content-wrapper" -->

				</div>
				<!-- End id="inner-content-container" -->

			</div>
			<!-- End id="content-container" -->

			@include('includes.footer')
