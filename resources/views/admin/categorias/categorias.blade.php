@extends('base')

@section('titulo', 'Categorias')

@section('contenido')
<div class="page-intro" style="margin-top: 0px;">
				<div class="container">
					<div class="row">
						<div class="col-md-12">
							<ol class="breadcrumb">
								<li><i class="fa fa-check-square pr-10"></i> <a href="{{route('admin')}}">Administración</a></li>
								<li><i class="fa fa-list pr-10"></i>Categorias</li>
							</ol>
						</div>
					</div>
				</div>
			</div>
<div class="container">
	<div class="row">
		<h1 class="page-title">Categorias</h1>
	</div>
	@include('flash::message')
	<hr>
	<a href="{{ route('admin.categorias.create')}}" class="btn btn-white"> Nueva Categoria</a>
	<table class="table table-hover">
		<thead>
			<th>ID</th>
			<th>Nombre</th>
			<th>Descripcion</th>
		</thead>
		<tbody>
			@foreach($categorias as $categoria)
				<tr onclick="location.href='{{ route('admin.categorias.edit',$categoria->id)}}'">
					<td>{{$categoria->id}}</td>
					<td>{{$categoria->nombre}}</td>
					<td>{{$categoria->descripcion}}</td>
				</tr>
			@endforeach
		</tbody>
	</table>
	
	{!! $categorias->render()!!}
</div>

@endsection