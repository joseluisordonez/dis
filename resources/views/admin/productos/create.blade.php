@extends('base')

@section('titulo', 'Crear Producto')

@section('contenido')
<div class="page-intro" style="margin-top: 0px;">
				<div class="container">
					<div class="row">
						<div class="col-md-12">
							<ol class="breadcrumb">
								<li><i class="fa  fa-check-square pr-10"></i> <a href="{{route('admin')}}">Administración</a></li>
								<li><i class="fa fa-wrench pr-10"></i><a href="{{Route('admin.productos.index')}}">Productos</a></li>
								<li class="active">Nuevo Producto</li>
							</ol>
						</div>
					</div>
				</div>
			</div>
<!-- Se esta utilizando un paquete para crear formularios que se llama Laravelcollective/html, https://laravelcollective.com/-->
<div class="container">
	<section>
		<div class="row">
			<h1 class="page-title">Nuevo Producto</h1>
		</div>
		<hr>
		@include('includes.mensajes')
		<section class="section gray-bg">
		{!! Form::open (['route' => 'admin.productos.store', 'method' => 'POST', 'files' => true, 'class' => 'form-horizontal', 'novalidate' =>'novalidate'])!!}
			<div class="form-group">
				{!! Form::label ('categoria_id','Categoria',['class'=>'col-sm-2 control-label'])!!}
				<div class="col-sm-4">
					{!! Form::select ('categoria_id',$categorias,null,['class'=>'form-control', 'placeholder' => 'Seleccione Categoria...','id' =>'categoria'])!!}
				</div>
			</div>
			<div class="form-group">
				{!! Form::label ('subcategoria_id','Subcategoria',['class'=>'col-sm-2 control-label'])!!}
				<div class="col-sm-4">
					{!! Form::select ('subcategoria_id',[ 'placeholder' => 'Seleccione Subcategoria...'],null,['class' => 'form-control','id' =>'subcategoria','disabled'])!!}
				</div>
			</div>
			<div class="form-group">
				{!! Form::label ('codigo','Codigo',['class'=>'col-sm-2 control-label'])!!}
				<div class="col-sm-2">
					{!! Form::text('codigo',null, ['class' => 'form-control','required'])!!}
				</div>
			</div>
			<div class="form-group">
				{!! Form::label ('nombre','Nombre',['class'=>'col-sm-2 control-label'])!!}
				<div class="col-sm-4">
					{!! Form::text('nombre',null, ['class' => 'form-control','required'])!!}
				</div>
			</div>
			<div class="form-group">
				{!! Form::label ('descripcion','Descripción',['class'=>'col-sm-2 control-label'])!!}
				<div class="col-sm-6">
					{!! Form::text('descripcion',null, ['class' => 'form-control'])!!}
				</div>
			</div>
			<div class="form-group">
				{!! Form::label ('costo','Costo',['class'=>'col-sm-2 control-label'])!!}
				<div class="col-sm-2">
					{!! Form::number('costo',null, ['class' => 'form-control'])!!}
				</div>
			</div>
			<div class="form-group">
				{!! Form::label ('precio_mayoreo','Precio Mayoreo',['class'=>'col-sm-2 control-label'])!!}
				<div class="col-sm-2">
					{!! Form::number('precio_mayoreo',null, ['class' => 'form-control'])!!}
				</div>
				{!! Form::label ('stock','Stock',['class'=>'col-sm-2 control-label'])!!}
				<div class="col-sm-2">
					{!! Form::number('stock',null, ['class' => 'form-control'])!!}
				</div>			
			</div>
			<div class="form-group">
				{!! Form::label ('precio_mediomayoreo','Precio Mediomayoreo',['class'=>'col-sm-2 control-label'])!!}
				<div class="col-sm-2">
					{!! Form::number('precio_mediomayoreo',null, ['class' => 'form-control'])!!}
				</div>
				{!! Form::label ('stock_min','Stock Minimo',['class'=>'col-sm-2 control-label'])!!}
				<div class="col-sm-2">
					{!! Form::number('stock_min',null, ['class' => 'form-control'])!!}
				</div>			
			</div>
			<div class="form-group">
				{!! Form::label ('precio_menudeo','Precio Menudeo',['class'=>'col-sm-2 control-label'])!!}
				<div class="col-sm-2">
					{!! Form::number('precio_menudeo',null, ['class' => 'form-control'])!!}
				</div>
				{!! Form::label ('stock_max','Stock Máximo',['class'=>'col-sm-2 control-label'])!!}
				<div class="col-sm-2">
					{!! Form::number('stock_max',null, ['class' => 'form-control'])!!}
				</div>			
			</div>			
			<div class="form-group">
				{!! Form::label('imagen','Imagen',['class'=>'col-sm-2 control-label']) !!}
				<div class="col-sm-4">
					{!! Form::file('imagen') !!}
					<p class="help-block">Seleccione una imagen para el producto.</p>
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