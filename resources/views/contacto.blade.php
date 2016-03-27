@extends('base')

@section('titulo', 'Contacto') 

@section('contenido')

<!-- banner start -->
<!-- ================ -->
<div class="banner">
	<!-- google maps start -->
	<div id="map-canvas"></div>
	<!-- google maps end -->
</div>
<!-- banner end -->
<section class="main-container" style="margin-top: 0px;">

	<div class="container">
		<div class="row">

			<!-- main start -->
			<!-- ================ -->
			<div class="main col-md-8">

				<!-- page-title start -->
				<!-- ================ -->
				<h1 class="page-title">Escribenos</h1>
				<!-- page-title end -->
				<p>En Distribuidora Insdustrial de la Sierra nos interesa mucho tu opinion, nos encantaria recibir tus comentarios o sugerencias.</p>
				<div class="alert alert-success hidden" id="MessageSent">
					Hemos recibido tu mensaje, prontro nos pondremos en contacto contigo, gracias!!!
				</div>
				<div class="alert alert-danger hidden" id="MessageNotSent">
					Oops! Algo no salio bien, por favor intentalo de nuevo.
				</div>
				<div class="contact-form">
					<form id="contact-form" role="form" novalidate="novalidate">
						<div class="form-group has-feedback">
							<label for="name">Nombre*</label>
							<input type="text" class="form-control" id="name" name="name" placeholder="">
							<i class="fa fa-user form-control-feedback"></i>
						</div>
						<div class="form-group has-feedback">
							<label for="email">Email*</label>
							<input type="email" class="form-control" id="email" name="email" placeholder="">
							<i class="fa fa-envelope form-control-feedback"></i>
						</div>
						<div class="form-group has-feedback">
							<label for="subject">Asunto*</label>
							<input type="text" class="form-control" id="subject" name="subject" placeholder="">
							<i class="fa fa-navicon form-control-feedback"></i>
						</div>
						<div class="form-group has-feedback">
							<label for="message">Mensaje*</label>
							<textarea class="form-control" rows="6" id="message" name="message" placeholder=""></textarea>
							<i class="fa fa-pencil form-control-feedback"></i>
						</div>
						<input type="submit" value="Submit" class="submit-button btn btn-default">
					</form>
				</div>
			</div>
			<!-- main end -->

			<!-- sidebar start -->
			<aside class="col-md-4">
				<div class="sidebar">
					<div class="side vertical-divider-left">
						<h3 class="title">Distribuidora Insdustrial de la Sierra</h3>
						<ul class="list">
							<li><strong></strong></li>
							<li><i class="fa fa-home pr-10"></i>Avenida Tecnologico No. 1164<br><span class="pl-20">Cd. Cuauhtémoc, Chih</span></li>
							<li><i class="fa fa-mobile pr-10 pl-5"></i><abbr title="Celular">Cel:</abbr> (625) 122-9395</li>
							<li><i class="fa fa-envelope pr-10"></i><a >contacto@distribuidorais.com</a></li>
							<li><i class="fa fa-check-square-o pr-10"></i><span>Horario:</span></li>
							<li><i class="fa fa-calendar pr-10"></i>Lunes a Viernes</li>
							<li><i class="fa fa-clock-o pr-10"></i> 8:30am a 1:30pm y 3:30pm a 6:00pm </li>
							<li><i class="fa fa-calendar pr-10"></i> Sabado </li>
							<li><i class="fa fa-clock-o pr-10"></i> 8:30am a 1:30pm</li>
						</ul>
						<hr>
						<ul class="social-links colored circle large">
							<li class="facebook"><a target="_blank" href="https://www.facebook.com/distribuidorainsdustrialdelasierra"><i class="fa fa-facebook"></i></a></li>
						</ul>
					</div>
				</div>
			</aside>
			<!-- sidebar end -->

		</div>
	</div>
</section>

@endsection