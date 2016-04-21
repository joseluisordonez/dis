@extends('base')

@section('titulo', 'Productos')

@section('contenido')
<div class="page-intro" style="margin-top: 0px;">
				<div class="container">
					<div class="row">
						<div class="col-md-12">
							<ol class="breadcrumb">
								<li><i class="fa fa-check-square pr-10"></i> <a href="{{route('admin')}}">Administración</a></li>
								<li><i class="fa fa-wrench pr-10"></i>Productos</li>
							</ol>
						</div>
					</div>
				</div>
			</div>
<div class="container">
	<div class="row">
		<h1 class="page-title">Productos</h1>
	</div>
	@include('flash::message')
	<hr>
	<a href="{{ route('admin.productos.create')}}" class="btn btn-white"> Nuevo Producto</a>
	<!-- Buscador de Productos(en el modelo se hace la funcion para buscar) -->
	{!!Form::open(['route' => 'admin.productos.index', 'method' => 'GET', 'class' => 'navbar-form pull-right'])!!}
		<div class="input-group">
			{!!Form::text('nombre',null, ['class' => 'form-control', 'placeholder' => 'Buscar producto...', 'aria-describedby'=>'search'])!!}
			<span class="input-group-addon" id="search"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></span>
		</div>
	{!!Form::close()!!}
	<!-- Fin del Buscador -->
	<table class="table table-hover">
		<thead>
			<th>Imagen</th>
			<th>Código</th>
			<th>Nombre</th>
			<th>Descripcion</th>
			<th>Precio de Lista</th>
			<th>Stock</th>
		</thead>
		<tbody>
			@foreach($productos as $producto)
				<tr onclick="location.href='{{ route('admin.productos.edit',$producto->id)}}'">
					<td><img src="{{ asset('images/productos')}}/{{$producto->imagen->nombre}}" style="width:100px"></td>
					<td>{{$producto->codigo}}</td>
					<td>{{$producto->nombre}}</td>
					<td>{{$producto->descripcion}}</td>
					<td>{{$producto->precio_venta1}}</td>
					<td>{{$producto->stock}}</td>
				</tr>
			@endforeach
		</tbody>
	</table>
	
	{!! $productos->render()!!}
</div>

@endsection