@extends('base')

@section('titulo', 'Administrador') 

@section('contenido')

<section class="main-container gray-bg" style="margin-top: 0px;">

				<!-- main start -->
				<!-- ================ -->
				<div class="main">
					<div class="container">
						<div class="row">
							<div class="col-md-12">
								<h1 class="text-center title">Panel de Administración</h1>
								<div class="separator"></div>
								<p class="text-center">Selecciona la opcion deseada.</p>
								<div class="row">
									<div class="col-sm-3">
										<div class="box-style-1 white-bg object-non-visible animated object-visible fadeInUpSmall" data-animation-effect="fadeInUpSmall" data-effect-delay="0">
											<i class="fa fa-users"></i>
											<h2>Usuarios</h2>
											<p>Crea usuarios administradores, vendedores o clientes, editalos o borralos.</p>
											<a href="{{route('admin.users.index')}}" class="btn-default btn">Entrar</a>
										</div>
									</div>
									<div class="col-sm-3">
										<div class="box-style-1 white-bg object-non-visible animated object-visible fadeInUpSmall" data-animation-effect="fadeInUpSmall" data-effect-delay="200">
											<i class="fa fa-list"></i>
											<h2>Categorias</h2>
											<p>Agrega nuevas categorias de productos, cambiales el nombre o borralas.</p>
											<a href="{{route('admin.categorias.index')}}" class="btn-default btn">Entrar</a>
										</div>
									</div>
									<div class="col-sm-3">
										<div class="box-style-1 white-bg object-non-visible animated object-visible fadeInUpSmall" data-animation-effect="fadeInUpSmall" data-effect-delay="200">
											<i class="fa fa-indent"></i>
											<h2>Subcategorias</h2>
											<p>Agrega nuevas subcategorias y asocialas a las categorias, editalas o borralas.</p>
											<a href="{{route('admin.subcategorias.index')}}" class="btn-default btn">Entrar</a>
										</div>
									</div>
									<div class="col-sm-3">
										<div class="box-style-1 white-bg object-non-visible animated object-visible fadeInUpSmall" data-animation-effect="fadeInUpSmall" data-effect-delay="400">
											<i class="fa fa-wrench"></i>
											<h2>Productos</h2>
											<p>Agrega nuevos productos a nuestro catalogo, cambia precios, nombres, etc.</p>
											<a href="{{route ('admin.productos.index')}}" class="btn-default btn">Entrar</a>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- main end -->

			</section>


@endsection