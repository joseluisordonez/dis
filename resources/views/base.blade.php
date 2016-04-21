<!DOCTYPE html>
<!--[if IE 9]> <html lang="es" class="ie9"> <![endif]-->
<!--[if IE 8]> <html lang="es" class="ie8"> <![endif]-->
<!--[if !IE]><!-->
<html lang="es">
<!--<![endif]-->
	<head>
		<meta charset="utf-8">
		<title>Distribuidorais.com | @yield('titulo')</title>
		<meta name="description" content="Distribuidora Industrial de la Sierra, equipo de seguridad, abrasivos, soldadura">
		<meta name="author" content="pepeordonez.com">

		<!-- Mobile Meta -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<!-- Favicon -->
		<link rel="shortcut icon" href="{{ asset('images/favicon.png')}}">

		@include('includes.css')

	</head>

	<!-- body classes: 
			"boxed": boxed layout mode e.g. <body class="boxed">
			"pattern-1 ... pattern-9": background patterns for boxed layout mode e.g. <body class="boxed pattern-1"> 
	-->
	<body class="front no-trans">
		<!-- scrollToTop -->
		<!-- ================ -->
		<div class="scrollToTop"><i class="icon-up-open-big"></i></div>

		<!-- page wrapper start -->
		<!-- ================ -->
		<div class="page-wrapper">

			<!-- header-top start (Add "dark" class to .header-top in order to enable dark header-top e.g <div class="header-top dark">) -->
			<!-- ================ -->
			<div class="header-top">
				<div class="container">
					<div class="row">
						<div class="col-xs-2 col-sm-6 ">

							<!-- header-top-first start -->
							<!-- ================ -->
							<div class="header-top-first clearfix">
								<ul class="social-links clearfix hidden-xs">
									<li class="facebook"><a target="_blank" href="https://www.facebook.com/distribuidorainsdustrialdelasierra"><i class="fa fa-facebook"></i></a></li>
									<li class="pinterest"><a href="{{URL::to('/contacto')}}"><i class="fa fa-envelope"></i></a></li>
								</ul>
							</div>
								
							
							<!-- header-top-first end -->

						</div>
						<div class="col-xs-10 col-sm-6">

							<!-- header-top-second start -->
							<!-- ================ -->
							<div id="header-top-second"  class="clearfix">

								<!-- header top dropdowns start -->
								<!-- ================ -->
								<div class="header-top-dropdown">
									
									<div class="btn-group dropdown">

										@if (Auth::user())
											<a href="{{route('admin')}}" class="btn dropdown-toggle"><i class="fa fa-user"></i> {{Auth::user()->name}}</a>
											<a href="{{route('logout')}}" class="btn"><i class="fa fa-sign-out"></i> Salir</a>
										@else
											<a href="{{route('login')}}" class="btn"><i class="fa fa-user"></i> Login</a>
										@endif

									</div>
									

								</div>
								<!--  header top dropdowns end -->

							</div>
							<!-- header-top-second end -->

						</div>
					</div>
				</div>
			</div>
			<!-- header-top end -->

			<!-- header start classes:
				fixed: fixed navigation mode (sticky menu) e.g. <header class="header fixed clearfix">
				 dark: dark header version e.g. <header class="header dark clearfix">
			================ -->
			<header class="header fixed clearfix">
				<div class="container">
					<div class="row">
						<div class="col-md-3">

							<!-- header-left start -->
							<!-- ================ -->
							<div class="header-left clearfix">

								<!-- logo -->
								<div class="logo">
									<a href="index.html"><img id="logo" src="{{ asset('images/logodis.png')}}" alt="Distribuidorais.com"></a>
								</div>

							</div>
							<!-- header-left end -->

						</div>
						<div class="col-md-9">

							<!-- header-right start -->
							<!-- ================ -->
							<div class="header-right clearfix">

								<!-- main-navigation start -->
								<!-- ================ -->
								<div class="main-navigation animated">

									<!-- navbar start -->
									<!-- ================ -->
									<nav class="navbar navbar-default" role="navigation">
										<div class="container-fluid">

											<!-- Toggle get grouped for better mobile display -->
											<div class="navbar-header">
												<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse-1">
													<span class="sr-only">Toggle navigation</span>
													<span class="icon-bar"></span>
													<span class="icon-bar"></span>
													<span class="icon-bar"></span>
												</button>
											</div>

											<!-- Collect the nav links, forms, and other content for toggling -->
											<div class="collapse navbar-collapse" id="navbar-collapse-1">
												<ul class="nav navbar-nav navbar-right">
													<li class=" {{ Request::is( '/') ? 'active' : '' }}">
													<a href="{{ URL::to( '/') }}">Inicio</a></li>
													<li class=" {{ Request::is( 'nosotros') ? 'active' : '' }}">
													<a href="{{ URL::to( '/nosotros') }}">nosotros</a></li>
													<li class="dropdown {{ Request::is( '/productos') ? 'active' : '' }}">
													<a href="{{route('productos')}}">Productos</a>
														<ul class="dropdown-menu">
															<li><a href="{{route('categoria',1)}}">Abrasivos</a></li>
															<li><a href="{{route('categoria',2)}}">Seguridad</a></li>
															<li><a href="{{route('categoria',3)}}">Soldadura</a></li>											
														</ul>
													</li>
													<li class=" {{ Request::is( '/contacto') ? 'active' : '' }}">
													<a href="{{ URL::to( '/contacto') }}">Contacto</a></li>
												</ul>
											</div>

										</div>
									</nav>
									<!-- navbar end -->

								</div>
								<!-- main-navigation end -->

							</div>
							<!-- header-right end -->

						</div>
					</div>
				</div>
			</header>
			<!-- header end -->	
			
					
					@yield('contenido')
					

			<!-- section start -->
			<!-- ================ -->
			<div class="section gray-bg text-muted footer-top clearfix">
				<div class="container">
					<div class="row">
						<div class="col-md-6">
							<div class="owl-carousel clients">
								<div class="client">
									<a href="#"><img src="{{ asset('images/client-1.png')}}" alt=""></a>
								</div>
								<div class="client">
									<a href="#"><img src="{{ asset('images/client-2.png')}}" alt=""></a>
								</div>
								<div class="client">
									<a href="#"><img src="{{ asset('images/client-3.png')}}" alt=""></a>
								</div>
								<div class="client">
									<a href="#"><img src="{{ asset('images/client-4.png')}}" alt=""></a>
								</div>
								<div class="client">
									<a href="#"><img src="{{ asset('images/client-5.png')}}" alt=""></a>
								</div>
								<div class="client">
									<a href="#"><img src="{{ asset('images/client-6.png')}}" alt=""></a>
								</div>
								<div class="client">
									<a href="#"><img src="{{ asset('images/client-7.png')}}" alt=""></a>
								</div>
								<!--<div class="client">
									<a href="#"><img src="images/client-8.png" alt=""></a>
								</div>-->
							</div>
						</div>
						<div class="col-md-6">
							<blockquote class="inline">
								<p class="margin-clear">La mejor publicidad es la que hacen los clientes satisfechos.</p>	
								<footer><cite title="Source Title">Philip Kotler </cite></footer>
							</blockquote>
						</div>
					</div>
				</div>
			</div>
			<!-- section end -->

			<!-- footer start (Add "light" class to #footer in order to enable light footer) -->
			<!-- ================ -->
			<footer id="footer">

				<!-- .footer start -->
				<!-- ================ -->
				<div class="footer">
					<div class="container">
						<div class="row">
							
								<div class="footer-content">
									<div class="row">
										<div class="col-sm-4">
											<ul class="list-icons">
												<li><i class="fa fa-calendar-o pr-10"></i>Lunes a Viernes</li>
												<li><i class="fa fa-clock-o pr-10"></i> 8:30am a 1:30pm y 3:30pm a 6:00pm </li>
												<li><i class="fa fa-calendar-o pr-10"></i> Sabado </li>
												<li><i class="fa fa-clock-o pr-10"></i> 8:30am a 1:30pm</li>
											</ul>
										</div>
										<div class="col-sm-4">
											<ul class="list-icons">
												<li><i class="fa fa-map-marker pr-10"></i> Av. Tecnológico No. 1164</li>
												<li><i class="fa fa-phone pr-10"></i>(625) 122.93.95</li>
												<li><i class="fa fa-envelope-o pr-10"></i> contacto@distribuidorais.com</li>
											</ul>
										</div>
										<div class="col-sm-4">
											<p>Siguenos</p>
											<ul class="social-links colored circle">
												<li class="facebook"><a target="_blank" href="http://www.facebook.com"><i class="fa fa-facebook"></i></a></li>
											</ul>
										</div>
									</div>
									
								</div>
							
							<div class="space-bottom hidden-lg hidden-xs"></div>
						</div>
						<div class="space-bottom hidden-lg hidden-xs"></div>
					</div>
				</div>
				<!-- .footer end -->

				<!-- .subfooter start -->
				<!-- ================ -->
				<div class="subfooter">
					<div class="container">
						<div class="row">
							<div class="col-md-6">
								<p>Un proyecto mas de <a target="_blank" href="http://pepeordonez.com">pepeordonez.com</a>. Todos los derechos reservados.</p>
							</div>
							<div class="col-md-6">
								<nav class="navbar navbar-default" role="navigation">
									<!-- Toggle get grouped for better mobile display -->
									<div class="navbar-header">
										<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse-2">
											<span class="sr-only">Toggle navigation</span>
											<span class="icon-bar"></span>
											<span class="icon-bar"></span>
											<span class="icon-bar"></span>
										</button>
									</div>   
									<div class="collapse navbar-collapse" id="navbar-collapse-2">
										<ul class="nav navbar-nav">
											<li><a href="{{URL::to('/')}}">Inicio</a></li>
											<li><a href="{{URL::to('nosotros')}}">Nosotros</a></li>
											<li><a href="{{URL::to('contacto')}}">Contacto</a></li>
								
										</ul>
									</div>
								</nav>
							</div>
						</div>
					</div>
				</div>
				<!-- .subfooter end -->

			</footer>
			<!-- footer end -->

		</div>
		<!-- page-wrapper end -->

		@include('includes.js')

	</body>
</html>
