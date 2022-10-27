@extends('paginas.partials.app')
@section('content')
@isset($product)
<div aria-label="breadcrumb" class="bg-light py-2 font-size-14">
    <ol class="breadcrumb container">
        <li class="breadcrumb-item"><a href="{{ route('index') }}"><i class="fas fa-home"></i></li>
        <li class="breadcrumb-item">
            <a href="{{ route('productos') }}" class="text-decoration-none">Productos</a>
        </li>
        <li class="breadcrumb-item"><a href="{{ route('categoria', ['id'=> $product->subCategory->category->id]) }}" class="text-decoration-none">{{$product->subCategory->category->name}}</a></li>
        <li class="breadcrumb-item active" aria-current="page">{{$product->name}}</li>
    </ol>
</div> 
@endisset
<div class="py-sm-2 py-md-5 bg-purple">
    <div class="container">
        <div class="row">
            <aside class="col-sm-12 col-md-3 d-sm-none d-md-block">
                <ul class="p-0" style="list-style: none;">
                    @foreach ($categories as $c)
                    <li class="py-2 text-white @if($c->name == $product->subCategory->category->name) active @endif"> 
                        <a href="#" class="category toggle d-block p-2 text-decoration-none position-relative {{ ($c->name == $product->subCategory->category->name) ? 'text-white' : 'color-link-gris' }}">{{$c->name}} <span class="position-absolute text-white {{ ($c->name == $product->subCategory->category->name) ? 'menos' : 'mas' }}" style="right: 10px;">+</span> </a>
                        @if (count($c->subCategories))
                            <ul class="mt-3 bg-light py-3 px-0 {{ ($c->name == $product->subCategory->category->name) ? '' : 'rd-none' }}" style="list-style: none">
                                @foreach ($c->subCategories as $sc)
                                    <li class="pb-2">
                                        <a href="#" class="toggle color-link-gris text-decoration-none text-blue ms-4 d-block ">{{$sc->name}}</a>
                                        @if (count($sc->products))
                                            <ul class="p-0 @if ($product->subCategory->name != $sc->name) rd-none @endif" style="list-style: none; background-color: #E9E9E9;">
                                                @foreach($sc->products as $p)
                                                    <li class="py-2 text-truncate ps-5" style="@if ($product->name == $p->name) background-color: #DCDCDC; @endif">
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
            <section class="producto col-sm-12 col-md-9 font-size-14">
                <div class="row mb-5">
                    <div class="col-sm-12 col-md-6">
                        <div id="carouselProduct" class="carousel slide border border-light border-2 mb-3" data-bs-ride="carousel">
                            <div class="carousel-inner bg-white">
                                @if (count($product->images))
                                    @foreach ($product->images as $k => $pi)
                                        <div class="carousel-item  @if(!$k) active @endif">
                                            <img src="{{ asset($pi->image) }}" class="d-block w-100 img-fluid" alt="{{$product->name}}">
                                        </div>                                    
                                    @endforeach
                                @else 
                                    <div class="carousel-item active">
                                        <img src="{{ asset('images/default.jpg') }}" class="d-block w-100 img-fluid" style="object-fit: contain;
                                    min-width: 100%; max-width: 100%;"> 
                                    </div>                                   
                                @endif
                            </div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselProduct" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#carouselProduct" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6">
                        <h1 class="mb-3 font-size-25 text-white">{{ $product->name }}</h1>
                        <p class="text-white text-uppercase">{{ $product->info }}</p>
                        <p class="mb-sm-2 mb-md-3 text-white">{{ $product->description }}</p>
                        @if ($product->weight)
                            <ul class="producto-peso d-flex flex-wrap p-0" style="list-style: none">
                                @php $pesos = Str::of($product->weight)->explode('|');  @endphp
                                @foreach ($pesos as $peso)
                                    <li class="me-2 text-white"> {{ $peso }} KG </li>
                                @endforeach
                            </ul>                            
                        @endif
                        <div class="d-flex flex-wrap">
                            @if ($product->extra)
                                <a href="{{ route('ficha-tecnica', ['id'=> $product->id]) }}" class="me-sm-0 me-md-3 mb-sm-3 mb-md-0 px-4 d-flex justify-content-between align-items-center btn py-2 ficha-tecnica rounded-pill text-white fw-bold" style="border: 1px solid #09BCC2;">
                                    <img src="{{ asset('images/Trazado_964.svg') }}">
                                    <span class="text-uppercase ms-2">descargar ficha</span>
                                </a>           
                            @endif
                            <a href="{{ route('contacto') }}" class="btn bg-blue text-uppercase text-white fw-bold rounded-pill py-2 px-4">consultar</a>
                        </div>
                    </div>
                </div>
                @if (count($relatedProducts))
                    <div class="row mb-5 productos-relacionados">
                        <div class="col-sm-12 mb-3">
                            <h5 class="text-uppercase text-white pb-3" style="border-bottom: 1px solid white;">productos relacionados</h5>
                        </div>
                        @foreach ($relatedProducts as $p)
                            <div class="col-sm-12 col-md-6">
                                @includeIf('paginas.partials.producto', ['p' => $p])
                            </div>       
                        @endforeach
                    </div>                  
                @endif
            </section>
        </div>
    </div>
</div>
@endsection
@push('scripts')
    <script src="{{ asset('js/axios.js') }}"></script>
    <script src="{{ asset('js/pages/product.js') }}"></script>
@endpush
