@extends('base')

@section('titulo', $user->name)

@section('contenido')
<div class="page-intro" style="margin-top: 0px;">
				<div class="container">
					<div class="row">
						<div class="col-md-12">
							<ol class="breadcrumb">
								<li><i class="fa  fa-check-square pr-10"></i> <a href="{{route('admin')}}">Administración</a></li>
								<li><i class="fa fa-users pr-10"></i><a href="{{Route('admin.users.index')}}">Usuarios</a></li>
								<li class="active">Editar Usuario</li>
							</ol>
						</div>
					</div>
				</div>
			</div>
<!-- Se esta utilizando un paquete para crear formularios que se llama Laravelcollective/html, https://laravelcollective.com/-->
<div class="container">
	<section>
		<div class="row">
			<h1 class="page-title">Editar Usuario</h1>
		</div>
		<hr>
		@include('includes.mensajes')
		<section class="section gray-bg">
		{!! Form::open (['route' => ['admin.users.update',$user], 'method' => 'PUT', 'class' => 'form-horizontal', 'novalidate' =>'novalidate'])!!}
			<div class="form-group">
				{!! Form::label ('name','Nombre',['class'=>'col-sm-2 control-label'])!!}
				<div class="col-sm-4">
					{!! Form::text('name',$user->name, ['class' => 'form-control','required'])!!}
				</div>
			</div>
			<div class="form-group">
				{!! Form::label ('apellido','Apellido',['class'=>'col-sm-2 control-label'])!!}
				<div class="col-sm-6">
					{!! Form::text('apellido',$user->apellido, ['class' => 'form-control'])!!}
				</div>
			</div>
			<div class="form-group">
				{!! Form::label ('email','Email',['class'=>'col-sm-2 control-label'])!!}
				<div class="col-sm-4">
					{!! Form::email('email',$user->email, ['class' => 'form-control','required'])!!}
				</div>
			</div>
			<div class="form-group">
				{!! Form::label ('permisos','Permisos',['class'=>'col-sm-2 control-label'])!!}
				<div class="col-sm-4">
					{!! Form::select ('permisos',['cliente'=>'Cliente','vendedor'=>'Vendedor','admin'=>'Administrador'],$user->permisos,['class'=>'form-control'])!!}
				</div>
			</div>
			<div class="col-sm-2"></div>
			<div class="col-sm-2">
				<div class="form-group">
					{!! form::submit('Guardar', ['class'=> 'btn btn-primary'])!!}
				</div>
			</div>
			<div class="col-sm-2">
				<a class="btn btn-danger" data-toggle="modal" data-target="#myModal">Eliminar</a>
				<!-- Modal -->
				<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
								<h4 class="modal-title" id="myModalLabel">Eliminar Usuario</h4>
							</div>
							<div class="modal-body">
								<p>Seguro que quieres eliminar al usuario {{$user->name}}?</p>	
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-sm btn-dark" data-dismiss="modal">Cerrar</button>
								<a href="{{ Route('admin.users.destroy',$user->id)}}" type="button" class="btn btn-sm btn-default" >Eliminar</a>
							</div>
						</div>
					</div>
				</div>
				<!-- Fin Modal -->
			</div>

			
		{!! Form::close() !!}
		</section>

	</section>
</div>
@stop