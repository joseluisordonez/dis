@extends('base')

@section('titulo', 'Iniciar Sesion') 

@section('contenido')

<section class="main-container gray-bg">

	<div class="container">
		<div class="row">

			<!-- main start -->
			<!-- ================ -->

			<div class="main object-non-visible animated object-visible fadeInDownSmall" data-animation-effect="fadeInDownSmall" data-effect-delay="300">
				<div class="form-block center-block">
					<h2 class="title">Iniciar Sesion</h2>
					<hr>
					@include('flash::message')
					{!! Form::open (['route' => 'login', 'method' => 'POST', 'class' => 'form-horizontal'])!!}
						<div class="form-group has-feedback">
							{!! Form::label ('email','Email',['class'=>'col-sm-3 control-label'])!!}
							<div class="col-sm-8">
								{!! Form::email('email',null, ['class' => 'form-control','required','placeholder'=>'ejemplo@mail.com'])!!}
								<i class="fa fa-user form-control-feedback"></i>
							</div>
						</div>
						<div class="form-group has-feedback">
							{!! Form::label ('password','Contraseña',['class'=>'col-sm-3 control-label'])!!}
							<div class="col-sm-8">
								{!! Form::password('password', ['class' => 'form-control', 'required', 'placeholder'=>'*********'])!!}
								<i class="fa fa-lock form-control-feedback"></i>
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-offset-3 col-sm-8">
								
								{!! form::submit('Iniciar Sesion', ['class'=> 'btn btn-group btn-default btn-sm'])!!}											
			
							</div>
						</div>
				</div>
				
			</div>
			<!-- main end -->

		</div>
	</div>
</section>

@endsection