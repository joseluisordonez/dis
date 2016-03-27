@extends('base')

@section('titulo', 'Crear Subategoria')

@section('contenido')
<div class="page-intro" style="margin-top: 0px;">
				<div class="container">
					<div class="row">
						<div class="col-md-12">
							<ol class="breadcrumb">
								<li><i class="fa  fa-check-square pr-10"></i> <a href="{{route('admin')}}">Administración</a></li>
								<li><i class="fa fa-indent pr-10"></i><a href="{{Route('admin.subcategorias.index')}}">Subcategorias</a></li>
								<li class="active">Nueva Subcategoria</li>
							</ol>
						</div>
					</div>
				</div>
			</div>
<!-- Se esta utilizando un paquete para crear formularios que se llama Laravelcollective/html, https://laravelcollective.com/-->
<div class="container">
	<section>
		<div class="row">
			<h1 class="page-title">Nueva Subcategoria</h1>
		</div>
		<hr>
		@include('includes.mensajes')
		<section class="section gray-bg">
		{!! Form::open (['route' => 'admin.subcategorias.store', 'method' => 'POST', 'class' => 'form-horizontal', 'novalidate' =>'novalidate'])!!}
			<div class="form-group">
				{!! Form::label ('categoria_id','Categoria',['class'=>'col-sm-2 control-label'])!!}
				<div class="col-sm-4">
					{!! Form::select ('categoria_id',$categorias,null,['class'=>'form-control', 'placeholder' => 'Seleccione Categoria...'])!!}
				</div>
			</div>
			<div class="form-group">
				{!! Form::label ('nombre','Nombre',['class'=>'col-sm-2 control-label'])!!}
				<div class="col-sm-4">
					{!! Form::text('nombre',null, ['class' => 'form-control','required','placeholder'=>'Nombre'])!!}
				</div>
			</div>
			<div class="form-group">
				{!! Form::label ('descripcion','Descripción',['class'=>'col-sm-2 control-label'])!!}
				<div class="col-sm-6">
					{!! Form::text('descripcion',null, ['class' => 'form-control', 'placeholder'=>'Descripción'])!!}
				</div>
			</div>
			<div class="col-sm-2"></div>
			<div class="col-sm-2">
				<div class="form-group">
					{!! form::submit('Guardar', ['class'=> 'btn btn-default'])!!}
				</div>
			</div>

			
		{!! Form::close() !!}
		</section>

	</section>
</div>
@stop