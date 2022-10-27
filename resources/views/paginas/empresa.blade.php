@extends('paginas.partials.app')
@section('content')
@isset($sliders)
	@if (count($sliders))
		<div id="sliderHeroEmpresa" class="carousel slide mb-4" data-bs-ride="carousel">
			<div class="carousel-indicators">
				@foreach ($sliders as $k => $v)
					<button type="button" data-bs-target="#sliderHeroEmpresa" data-bs-slide-to="{{$k}}" class="@if(!$k) active @endif"  aria-current="true" aria-label="Slide {{ $k}}"></button>					
				@endforeach
			</div>
			<div class="carousel-inner">
				@foreach ($sliders as $k => $v)
				<div class="carousel-item @if(!$k) active @endif">
					<img src="{{ asset($v->image) }}" class="d-block w-100" alt="...">
				</div>				
				@endforeach
			</div>
		</div>		
	@endif
@endisset
@if ($company)
	<div class="pt-3 pb-5">
		<div class="container">
			<div class="row fw-light">
				<div class="col-sm-12 col-md-6">
					<div class="mb-4 font-size-20 text-blue fw-bold">{{$company->content_1 }}</div>
					<div class="font-size-15 fw-bolder">
						{!! $company->content_2 !!}
					</div>
				</div>
				<div class="col-sm-12 col-md-6">
					@if (Storage::disk('custom')->url($company->image))
						<img src="{{ asset($company->image) }}" class="img-fluid">
					@endif
				</div>
			</div>
		</div>
	</div>	
@endif
@endsection