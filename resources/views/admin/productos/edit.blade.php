@extends('base')

@section('titulo', $producto->nombre)

@section('contenido')
<div class="page-intro" style="margin-top: 0px;">
				<div class="container">
					<div class="row">
						<div class="col-md-12">
							<ol class="breadcrumb">
								<li><i class="fa  fa-check-square pr-10"></i> <a href="{{route('admin')}}">Administración</a></li>
								<li><i class="fa fa-wrench pr-10"></i><a href="{{Route('admin.productos.index')}}">Productos</a></li>
								<li class="active">Editar Producto</li>
							</ol>
						</div>
					</div>
				</div>
			</div>
<!-- Se esta utilizando un paquete para crear formularios que se llama Laravelcollective/html, https://laravelcollective.com/-->
<div class="container">
	<section>
		<div class="row">
			<h1 class="page-title">Editar Producto</h1>
		</div>
		<hr>
		@include('includes.mensajes')
		<section class="section gray-bg">
		{!! Form::open (['route' => ['admin.productos.update',$producto], 'method' => 'PUT', 'class' => 'form-horizontal', 'novalidate' =>'novalidate'])!!}
			<div class="form-group">
				{!! Form::label ('categoria_id','Categoria',['class'=>'col-sm-2 control-label'])!!}
				<div class="col-sm-4">
					{!! Form::select ('categoria_id',$categorias,$producto->categoria_id,['class'=>'form-control','id' =>'categoria'])!!}
				</div>
			</div>
			<div class="form-group">
				{!! Form::label ('subcategoria_id','Subcategoria',['class'=>'col-sm-2 control-label'])!!}
				<div class="col-sm-4">
					{!! Form::select ('subcategoria_id',$subcategorias,$producto->subcategoria_id,['class' => 'form-control','id' =>'subcategoria'])!!}
				</div>
			</div>
			<div class="form-group">
				{!! Form::label ('codigo','Codigo',['class'=>'col-sm-2 control-label'])!!}
				<div class="col-sm-2">
					{!! Form::text('codigo',$producto->codigo, ['class' => 'form-control','required'])!!}
				</div>
			</div>
			<div class="form-group">
				{!! Form::label ('nombre','Nombre',['class'=>'col-sm-2 control-label'])!!}
				<div class="col-sm-4">
					{!! Form::text('nombre',$producto->nombre, ['class' => 'form-control','required'])!!}
				</div>
			</div>
			<div class="form-group">
				{!! Form::label ('descripcion','Descripción',['class'=>'col-sm-2 control-label'])!!}
				<div class="col-sm-6">
					{!! Form::text('descripcion',$producto->descripcion, ['class' => 'form-control'])!!}
				</div>
			</div>
			<div class="form-group">
				{!! Form::label ('costo','Costo',['class'=>'col-sm-2 control-label'])!!}
				<div class="col-sm-2">
					{!! Form::number('costo',$producto->costo, ['class' => 'form-control'])!!}
				</div>
			</div>
			<div class="form-group">
				{!! Form::label ('precio_mayoreo','Precio Mayoreo',['class'=>'col-sm-2 control-label'])!!}
				<div class="col-sm-2">
					{!! Form::number('precio_mayoreo',$producto->precio_mayoreo, ['class' => 'form-control'])!!}
				</div>
				{!! Form::label ('stock','Stock',['class'=>'col-sm-2 control-label'])!!}
				<div class="col-sm-2">
					{!! Form::number('stock',$producto->stock, ['class' => 'form-control'])!!}
				</div>
			</div>
			<div class="form-group">
				{!! Form::label ('precio_mediomayoreo','Precio Mediomayoreo',['class'=>'col-sm-2 control-label'])!!}
				<div class="col-sm-2">
					{!! Form::number('precio_mediomayoreo',$producto->precio_mediomayoreo, ['class' => 'form-control'])!!}
				</div>
				{!! Form::label ('stock_min','Stock Minimo',['class'=>'col-sm-2 control-label'])!!}
				<div class="col-sm-2">
					{!! Form::number('stock_min',$producto->stock_min, ['class' => 'form-control'])!!}
				</div>
				
			</div>
			<div class="form-group">
				{!! Form::label ('precio_menudeo','Precio Menudeo',['class'=>'col-sm-2 control-label'])!!}
				<div class="col-sm-2">
					{!! Form::number('precio_menudeo',$producto->precio_menudeo, ['class' => 'form-control'])!!}
				</div>
				
				{!! Form::label ('stock_max','Stock Máximo',['class'=>'col-sm-2 control-label'])!!}
				<div class="col-sm-2">
					{!! Form::number('stock_max',$producto->stock_max, ['class' => 'form-control'])!!}
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
								<h4 class="modal-title" id="myModalLabel">Eliminar Producto</h4>
							</div>
							<div class="modal-body">
								<p>Seguro que quieres eliminar el producto {{$producto->nombre}}?</p>	
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-sm btn-dark" data-dismiss="modal">Cerrar</button>
								<a href="{{ Route('admin.productos.destroy',$producto->id)}}" type="button" class="btn btn-sm btn-default" >Eliminar</a>
							</div>
						</div>
					</div>
				</div>
				<!-- Fin Modal -->
			</div>

			
		{!! Form::close() !!}
			</div>

			
		{!! Form::close() !!}
		</section>

	</section>
</div>
@stop