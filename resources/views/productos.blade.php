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
					
					@if(isset($categoria))
						<li class="active">{{$categoria->nombre}}</li>
					@endif
				</ol>
			</div>
		</div>
	</div>
</div>
<!-- page-intro end -->


<!-- section start -->
<!-- ================ -->
<div class="section clearfix">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h2>Nuestros Productos</h2>
				<div class="separator-2"></div>
				<p>Contamos con gran variedad de productos </p>
				<!-- Buscador
					<div class="sorting-filters">
						<form class="form-inline">
							<div class="form-group">
								<label>Sort by</label>
								<select class="form-control">
									<option selected="selected">Date</option>
									<option>Price</option>
									<option>Model</option>
								</select>
							</div>
							<div class="form-group">
								<label>Order</label>
								<select class="form-control">
									<option selected="selected">Acs</option>
									<option>Desc</option>
								</select> 
							</div>
							<div class="form-group">
								<label>Price $ (min/max)</label>
								<div class="row grid-space-10">
									<div class="col-sm-6">
										<input type="text" class="form-control">
									</div>
									<div class="col-sm-6">
										<input type="text" class="form-control col-xs-6">
									</div>
								</div>
							</div>
							<div class="form-group">
								<label>Category</label>
								<select class="form-control">
									<option selected="selected">Smartphones</option>
									<option>Tablets</option>
									<option>Smart Watches</option>
									<option>Desktops</option>
									<option>Software</option>
									<option>Accessories</option>
								</select> 
							</div>
							<div class="form-group">
								<a href="#" class="btn btn-default">Submit</a>
							</div>
						</form>
					</div>
			Fin Buscador-->

				<div class="row grid-space-20">
					<!-- shop items start -->
					<div class="masonry-grid-fitrows row grid-space-20">
					@foreach($productos as $product)
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
									<h3 class="title"><a href="{{ route('producto',$product->id)}}">{{$product->nombre}}</a></h3>
									<p>{{$product->descripcion}}</p>
									<span class="price">${{$product->precio_menudeo}}</span>
									<div class="elements-list pull-right">
										
										<a href="">{{$product->categoria->nombre}}</a>
									</div>
								</div>
							</div>
						</div>
						
					@endforeach	
					</div>
					<!-- shop items end -->
					
					<div class="clearfix"></div>

					<!-- pagination start -->
					{!! $productos->render() !!}
					<!-- pagination end -->
			
				</div>
			</div>
		</div>
	</div>
</div>
<!-- section end -->


@endsection