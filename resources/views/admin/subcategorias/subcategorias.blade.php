@extends('base')

@section('titulo', 'SubSubcategorias')

@section('contenido')
<div class="page-intro" style="margin-top: 0px;">
				<div class="container">
					<div class="row">
						<div class="col-md-12">
							<ol class="breadcrumb">
								<li><i class="fa fa-check-square pr-10"></i> <a href="{{route('admin')}}">Administración</a></li>
								<li><i class="fa fa-indent pr-10"></i>Subcategorias</li>
							</ol>
						</div>
					</div>
				</div>
			</div>
<div class="container">
	<div class="row">
		<h1 class="page-title">Subcategorias</h1>
	</div>
	@include('flash::message')
	<hr>
	<a href="{{ route('admin.subcategorias.create')}}" class="btn btn-white"> Nueva Subcategoria</a>
	<table class="table table-hover">
		<thead>
			<th>ID</th>
			<th>Nombre</th>
			<th>Descripcion</th>
			<th>Categoria</th>
		</thead>
		<tbody>
			@foreach($subcategorias as $subcategoria)
				<tr onclick="location.href='{{ route('admin.subcategorias.edit',$subcategoria->id)}}'">
					<td>{{$subcategoria->id}}</td>
					<td>{{$subcategoria->nombre}}</td>
					<td>{{$subcategoria->descripcion}}</td>
					<td>{{$subcategoria->categoria->nombre}}</td>
				</tr>
			@endforeach
		</tbody>
	</table>
	
	{!! $subcategorias->render()!!}
</div>

@endsection