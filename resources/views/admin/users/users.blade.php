@extends('base')

@section('titulo', 'Usuario')

@section('contenido')
<div class="page-intro" style="margin-top: 0px;">
				<div class="container">
					<div class="row">
						<div class="col-md-12">
							<ol class="breadcrumb">
								<li><i class="fa fa-check-square pr-10"></i> <a href="{{route('admin')}}">Administración</a></li>
								<li><i class="fa fa-users pr-10"></i>Usuarios</li>
							</ol>
						</div>
					</div>
				</div>
			</div>
<div class="container">
	<div class="row">
		<h1 class="page-title">Usuarios</h1>
	</div>
	@include('flash::message')
	<hr>
	<a href="{{ route('admin.users.create')}}" class="btn btn-white"> Nuevo Usuario</a>
	<table class="table table-hover">
		<thead>
			<th>ID</th>
			<th>Nombre</th>
			<th>Apellido</th>
			<th>Email</th>
			<th>Permisos</th>
		</thead>
		<tbody>
			@foreach($users as $user)
				<tr onclick="location.href='{{ route('admin.users.edit',$user->id)}}'">
					<td>{{$user->id}}</td>
					<td>{{$user->name}}</td>
					<td>{{$user->apellido}}</td>
					<td>{{$user->email}}</td>	
					@if ($user->permisos == 'admin')
						<td><span class="radius btn-success btn-sm">Administrador</span></td>
					@elseif ($user->permisos == 'cliente')
						<td><span class="radius btn-primary btn-sm">Cliente</span></td>
					@else
						<td><span class="radius btn-warning btn-sm">Vendedor</span></td>
					@endif

				</tr>
			@endforeach
		</tbody>
	</table>
	
	{!! $users->render()!!}
</div>

@endsection