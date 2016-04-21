@extends('base')

@section('titulo', 'Contacto') 

@section('contenido')

<!-- page-intro start-->
<!-- ================ -->
<div class="page-intro" style="margin-top: 0px;">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<ol class="breadcrumb">
					<li><i class="fa  fa-home pr-10"></i> <a href="{{URL('/')}}">Inicio</a></li>
					<li><i class="fa fa-sort-amount-asc pr-10"></i><a href="{{Route('categoria',$producto->categoria_id)}}">{{$producto->categoria->nombre}}</a></li>
					<li class="active">{{$producto->codigo}}</li>
				</ol>
			</div>
		</div>
	</div>
</div>
<!-- page-intro end -->

<!-- main-container start -->
<!-- ================ -->
<section class="main-container">

	<div class="container">
		<div class="row">

			<!-- main start -->
			<!-- ================ -->
			<div class="main col-md-12">

				<!-- page-title start -->
				<!-- ================ -->
				<h1 class="page-title margin-top-clear">{{$producto->nombre}}</h1>
				<!-- page-title end -->

				<div class="row">
					<div class="col-md-4">
						<!-- Nav tabs -->
						<ul class="nav nav-pills white space-top" role="tablist">
							<li class="active"><a href="#product-images" role="tab" data-toggle="tab" title="images"><i class="fa fa-camera pr-5"></i> Imagen</a></li>
					
						</ul>

						<!-- Tab panes start-->
						<div class="tab-content clear-style">
							<div class="tab-pane active" id="product-images">
								<div class="owl-carousel content-slider-with-controls-bottom">
									<div class="overlay-container">
										<img src="{{ asset('images/productos')}}/{{$producto->imagen->nombre}}" alt="">
										<a href="{{ asset('images/productos')}}/{{$producto->imagen->nombre}}" class="popup-img overlay" title="{{$producto->codigo}} - {{$producto->nombre}}"><i class="fa fa-search-plus"></i></a>
									</div>
								</div>
							</div>
						</div>
						<!-- Tab panes end-->
						<hr>
						<span class="price"> ${{$producto->precio_menudeo}}</span>
						<div class="elements-list pull-right clearfix"></div>
						<div class="clearfix"></div>
						<hr>
					
					</div>

					<!-- product side start -->
					<aside class="col-md-8">
						<div class="sidebar">
							<div class="side product-item vertical-divider-left">
								<div class="tabs-style-2">
									<!-- Nav tabs -->
									<ul class="nav nav-tabs" role="tablist">
										<li class="active"><a href="#h2tab1" role="tab" data-toggle="tab"><i class="fa fa-file-text-o pr-5"></i>Especificaciones </a></li>
				
									</ul>
									<!-- Tab panes -->
									<div class="tab-content padding-top-clear padding-bottom-clear">
										<div class="tab-pane fade in active" id="h2tab1">
											<h4>Descripción</h4>
											<p>{{$producto->descripcion}}</p>
											<dl class="dl-horizontal">
												<dt>Codigo</dt><dd>{{$producto->codigo}}</dd>
												<dt>Nombre</dt><dd>{{$producto->nombre}}</dd>
												<dt>Categoria</dt><dd>{{$producto->categoria->nombre}}</dd>
												<dt>Subcategoria</dt><dd>{{$producto->subcategoria->nombre}}</dd>
											</dl>
											
										</div>
									</div>
								</div>
							</div>
						</div>
					</aside>
					<!-- product side end -->
				</div>

			</div>
			<!-- main end -->

		</div>
	</div>
</section>
<!-- main-container end -->
<!-- section start -->
<!-- ================ -->
<div class="section default-bg clearfix">
	<div class="container">
		<div class="call-to-action">
			<div class="row">
				<div class="col-md-8">
					<h1 class="title text-center">Nuestros productos</h1>
					<p class="text-center">Tenemos todo lo que tu empresa necesita </p>
				</div>
				<div class="col-md-4">
					<div class="text-center">
						<a href="{{URL::to('productos')}}" class="btn btn-default btn-lg">Ver Todo</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- section end -->

<!-- section start -->
<!-- ================ -->
<div class="section clearfix">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h2>Productos Relacionados</h2>
				<div class="separator-2"></div>
				<p>Tal vez te podrian interesar los siguientes productos </p>
				<div class="row grid-space-20">
					<!-- shop items start -->
					<div class="masonry-grid-fitrows row grid-space-20">
					@foreach($productos as $product)
						@if($producto->id != $product->id)
						<div class="col-md-3 col-sm-6 masonry-grid-item">
							<div class="listing-item">
								<div class="overlay-container">
									<img src="{{ asset('images/productos')}}/{{$product->imagen->nombre}}">
									
									<a href="{{ route('producto',$product->id)}}" class="overlay small">
										<i class="fa fa-plus"></i>
										<span>Ver Detalles</span>
									</a>
								</div>
								<div class="listing-item-body clearfix">
									<h3 class="title"><a href="{{ route('producto',$producto->id)}}">{{$product->nombre}}</a></h3>
									<p>{{$product->descripcion}}</p>
									<span class="price">${{$product->precio_menudeo}}</span>
									<div class="elements-list pull-right">
										
										<a href="">{{$product->categoria->nombre}}</a>
									</div>
								</div>
							</div>
						</div>
						@endif
					@endforeach	
					</div>
					<!-- shop items end -->
					
					<div class="clearfix"></div>

					<!-- pagination start -->
					{!!$productos->render()!!}
					<!-- pagination end -->
			
				</div>
			</div>
		</div>
	</div>
</div>
<!-- section end -->


@endsection