@extends('paginas.partials.app')
@push('head')
    <meta name="url" content="{{ route('index') }}">
@endpush
@section('content')
<div class="container">
    @if ($errors->any())
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            @foreach ($errors->all() as $error)
                <span class="d-block">{{$error}}</span>
            @endforeach
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>  
    @endif
    @if (Session::has('mensaje'))
        <div class="alert alert-{{Session::get('class')}} alert-dismissible fade show" role="alert">
            <strong>{{ Session::get('mensaje') }}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>                    
    @endif
    
    <form action="{{ route('send-quote') }}" method="post" id="cotizadorOnline" enctype="multipart/form-data" class="py-sm-2 py-md-5" style="color: #666666;">
        @csrf
        <div id="section1">
            <div class="w-75 mx-auto">
                <img src="{{ asset('images/s1.png') }}" alt="" class="mx-auto img-fluid mb-3 d-sm-none d-md-block" style="object-fit: contain; max-width: 600px;">
                <div class="row">
                    <div class="col-sm-12 col-md-6 mb-3">
                        <div class="form-group">
                            <input type="text" name="name" value="{{ old('name') }}" class="form-control" placeholder="Ingresar el nombre *">
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6 mb-3">
                        <div class="form-group">
                            <input type="email" name="email" value="{{ old('email') }}" class="form-control" placeholder="Ingrese su correo electrónico *">
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6 mb-3">
                        <div class="form-group">
                            <input type="text" name="phone" value="{{ old('phone') }}" class="form-control" placeholder="Ingrese su teléfono *">
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6 mb-3">
                        <div class="form-group">
                            <input type="text" name="company" value="{{ old('company') }}" class="form-control" placeholder="Empresa">
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6 mb-3">
                        <div class="form-group">
                            <input type="text" name="location" value="{{ old('location') }}" class="form-control" placeholder="Localidad">
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6 mb-3">
                        <div class="form-group">
                            <input type="text" name="province" value="{{ old('province') }}" class="form-control" placeholder="Provincia">
                        </div>
                    </div>
                </div>
                <div class="row justify-content-end py-3">
                    <div class="d-flex flex-sm-wrap flex-md-nowrap col-sm-12 col-md-6">
                        <strong class="me-2">Nota</strong>
                        <span class="font-size-12 fst-italic" style="color: #7E90A1;">Se permite el retiro al por mayor de ventas mayores a 100 Kg Se realizan entregas en ventas mayores a 400 Kg</span>
                    </div>
                    <div class="col-sm-12 col-md-6 text-end">
                        <button type="button" id="btnS1" class="btn text-uppercase bg-blue text-white fw-bold rounded-pill py-2 px-4" style="border-radius: 0;">Siguiente <i class="fas fa-chevron-right"></i> </button>
                    </div>
                </div>
            </div>
        </div>
        <div id="section2" class="d-none">
            <div class="w-75 mx-auto">
                <img src="{{ asset('images/s2.png') }}" alt="" class="mx-auto img-fluid mb-3 d-sm-none d-md-block" style="object-fit: contain; max-width: 600px;">
                <div class="row">
                    <div class="col-sm-12 mb-3">
                        <div class="form-group">
                            <textarea name="message" class="form-control" cols="30" rows="5">{{ old('message') }}</textarea>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-5 mb-sm-3 mb-md-5 position-relative">
                        <div class="input-group mb-2 mr-sm-2">
                            <input type="text" class="form-control" placeholder="examinar..." style="padding: 0 !important; padding-left: 10px !important;">
                            <div class="input-group-prepend">
                                <div class="input-group-text"><i class="far fa-folder"></i></div>
                            </div>
                        </div>
                        <input type="file" name="file" class="form-control-file position-absolute" 
                        style="top: 2.5px; left: 15px; width: 100%; cursor: pointer; padding: 0 !important;">
                    </div>
                </div>
                <div class="d-flex justify-content-between py-3">
                    <button type="button" id="btnS2" data-mover="seccion2" class="btn text-blue text-uppercase fw-bold rounded-pill px-5" style="    border: 1px solid #09BCC2;">volver</button>
                    <button type="submit" class="btn text-uppercase text-white bg-blue fw-bold px-5 bg-blue rounded-pill" style="border-radius: 0">siguiente <i class="fas fa-chevron-right"></i></button>
                </div>
            </div>
        </div>
    </form>
</div>

@endsection
@push('head')
    <style>
        input{
            padding: 15px !important;
        }
        input:focus,
        textarea:focus{
            border: 1px solid #3C284F !important;
        }
        form{
            max-width: 1100px;
            margin: auto;
        }
    </style>
@endpush
@push('scripts')
    <script src="{{ asset('js/axios.js') }}"></script>
    <script src="{{ asset('js/pages/quote.js') }}"></script>
@endpush