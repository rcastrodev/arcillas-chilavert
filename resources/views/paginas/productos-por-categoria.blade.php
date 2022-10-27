@extends('paginas.partials.app')
@section('content')
<div aria-label="breadcrumb" class="bg-breadcrumb py-2 font-size-14">
	<div class="container">
		<ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('index') }}"><i class="fas fa-home"></i></li>
			<li class="breadcrumb-item"><a href="{{ route('productos') }}">productos</a></li>
			<li class="breadcrumb-item active" aria-current="page">{{ $category->name }}</li>
		</ol>
	</div>
</div>
@isset($categories)
    @if (count($categories))
        <section class="bg-purple categorias">
            <div class="container row py-md-5 py-sm-2 mx-auto px-0">
                <aside class="col-sm-12 col-md-3 d-sm-none d-md-block">
                    <ul class="p-0" style="list-style: none;">
                        @foreach ($categories as $c)
                        <li class="py-2 text-white @if($c->name == $category->name) active @endif"> 
                            <a href="#" class="category toggle d-block p-2 text-decoration-none position-relative {{ ($c->name == $category->name) ? 'text-white' : 'color-link-gris' }}">{{$c->name}} <span class="position-absolute text-white {{ ($c->name == $category->name) ? 'menos' : 'mas' }}" style="right: 10px;">+</span> </a>
                            @if (count($c->subCategories))
                                <ul class="mt-3 bg-light py-3 px-0 {{ ($c->name == $category->name) ? '' : 'rd-none' }}" style="list-style: none">
                                    @foreach ($c->subCategories as $sc)
                                        <li class="pb-2">
                                            <a href="#" class="toggle color-link-gris text-decoration-none text-blue ms-4 d-block mb-3">{{$sc->name}}</a>
                                            @if (count($sc->products))
                                                <ul class="rd-none px-0" style="list-style: none; background-color: #E9E9E9;">
                                                    @foreach($sc->products as $p)
                                                        <li class="py-2 ps-5 text-truncate">
                                                            <a href="{{ route('producto', ['product'=> $p->id]) }}" class="text-blue text-decoration-none {{ ($p->name) ? 'active' : '' }}">{{$p->name}}</a>
                                                        </li>
                                                    @endforeach
                                                </ul>               
                                            @endif
                                        </li>
                                    @endforeach        
                                </ul>
                            @endif
                        </li>                      
                        @endforeach
                        
                    </ul>
                </aside>
                <section class="col-sm-12 col-md-9 font-size-14">
                    <div class="row">
                        @isset($products)
                            @foreach ($products as $p)
                                <div class="col-sm-12 col-md-6 mb-3">
                                    @include('paginas.partials.producto', ['p' => $p])
                                </div>
                            @endforeach                    
                        @endisset
                    </div>

                </section>
            </div>
        </section>
    @endif
@endisset

@endsection
@push('scripts')
    <script src="{{ asset('js/pages/product.js') }}"></script>
@endpush
