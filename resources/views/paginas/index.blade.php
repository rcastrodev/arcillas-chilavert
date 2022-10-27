@extends('paginas.partials.app')
@section('content')
@isset($section1s)
	@if (count($section1s))
		<div id="sliderHero" class="carousel slide" data-bs-ride="carousel">
			<div class="carousel-indicators">
				@foreach ($section1s as $k => $v)
					<button type="button" data-bs-target="#sliderHero" data-bs-slide-to="{{$k}}" class="@if(!$k) active @endif"  aria-current="true" aria-label="Slide {{$k}}"></button>
				@endforeach
			</div>
			<div class="carousel-inner">
				@foreach ($section1s as $k => $v)
					<div class="carousel-item @if(!$k) active @endif" style="background-image: url({{ asset('images/IMG_6666.png') }})">
						<img src="{{ asset($v->content_1) }}" class="d-sm-none d-md-block w-100 logo-hero">
						<img src="{{ asset($v->image) }}" class="d-block w-100">
						<div class="carousel-caption d-none d-md-block text-start">
							<h2 class="text-white text-uppercase font-size-124 fw-normal eurostyle">{{ $v->content_2 }}</h2>
						</div>
					</div>
				@endforeach
			</div>
		</div>		
	@endif
@endisset
<section id="filter" class="bg-purple2">
	<div class="container py-sm-2 py-md-4">
		<form data-producturl="{{ route('producto') }}" id="productFilter" class="row" data-url="{{ route('productFilter') }}">
			<div class="form-group col-sm-12 col-md-4 mb-sm-3 mb-md-0">
				<select name="category_id" id="category_id" class="form-control">
					<option value="0">seleccione una categoría</option>
					@foreach ($categories as $c)
						<option value="{{$c->id}}">{{$c->name}}</option>
					@endforeach
				</select>
			</div>
			<div class="form-group col-sm-12 col-md-4 mb-sm-3 mb-md-0">
				<select name="product" id="product_id" class="form-control">
					<option value="0">seleccione un producto</option>
				</select>
			</div>
			<div class="col-sm-12 col-md-3 mb-sm-3 mb-md-0">
				<button type="submit" class="text-uppercase bg-white text-blue w-100" style="padding: 6px;" disabled><i class="fas fa-search me-2"></i> buscar</button>
			</div>
		</form>
	</div>
</section>
@if (count($categories))
	<section class="py-5 bg-purple">
		<h2 class="text-center fw-bold mb-5 text-uppercase font-size-20 text-white">conocé nuestas categorías</h2>
		<div class="container row mx-auto mt-5">
			@foreach ($categories as $c)
				<div class="col-sm-12 col-md-4 mb-3">
					<div class="card producto">
						<div class="position-relative bg-white">  
							<a href="{{ route('categoria', ['id'=> $c->id ]) }}" class="mas position-absolute text-decoration-none font-size-40 text-white fw-light">+</a>
							@if ($c->image)
								<img src="{{ asset($c->image) }}" class="img-fluid img-product" style="">
							@else
								<img src="{{ asset('images/default.jpg') }}" class="img-fluid img-product" style="">
							@endif
						</div>
						<div class="card-body ps-0">
							<p class="card-text mb-0 fw-normal text-truncate">
								<a href="{{ route('categoria', ['id'=> $c->id ]) }}" class="font-size-15 text-white text-uppercase">{{$c->name}}</a>
							</p>
						</div>
					</div>
				</div>
			@endforeach
		</div>
	</section>
@endif
@isset($section2)
	@if ($section2)
		<section id="section2" class="d-flex align-items-center py-sm-2 py-md-5 text-white" style="background-image: url({{$section2->image}}); background-size: 100% 100%; min-height: 288px;">
			<div class="container">
				<div class="row">
					<div class="col-sm-12 col-md-5 text-sm-center text-md-end pe-sm-0 pe-md-5" style="border-right: 4px solid white;">
						<h3 class="mb-sm-2 mb-md-5 font-size-21">{!!$section2->content_1!!}</h3>
						<a href="{{ route('contacto') }}" class="text-uppercase bg-blue text-white btn bg-blue px-4 mb-sm-2 mb-md-0" style="border-radius: 20px;">conocenos</a>
					</div>
					<div class="col-sm-12 col-md-7 text-white ps-sm-0 ps-md-5 text-sm-center text-md-start">{!!$section2->content_2!!}</div>
				</div>
			</div>
		</section>
	@endif
@endisset
@if (count($products))
	<section class="py-5 bg-white">
		<h2 class="text-center fw-bold mb-5 text-uppercase font-size-20 text-purple2">Productos destacados</h2>
		<div class="container row mx-auto mt-5">
			@foreach ($products as $p)
				<div class="col-sm-12 col-md-4 mb-3">
					@include('paginas.partials.producto', ['p' => $p])
				</div>
			@endforeach
			<div class="col-sm 12 text-center">
				<a href="{{ route('productos') }}" class="btn bg-blue text-white text-uppercase py-2 px-5 fw-bolder" style="border-radius: 25px;">ver más</a>
			</div>
		</div>
	</section>
@endif
@endsection
@push('scripts')
	<script src="{{ asset('js/pages/index.js') }}"></script>
	<script>
		document.getElementById('productFilter').addEventListener('submit', function(e) {
			e.preventDefault()
			let form = e.currentTarget
			let product_id = document.getElementById('product_id')
			form.querySelector('button').innerHTML = "cargando... <img src='{{asset('images/loading.gif')}}' width='20'>"
			setTimeout(() => {
				window.location.href = `${form.dataset.producturl}/${product_id.value}`;
			}, 2000);
			
		})
	</script>
@endpush