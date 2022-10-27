@extends('paginas.partials.app')
@section('content')
<iframe src="https://www.google.com/maps/embed?pb=!1m16!1m12!1m3!1d3286.67791370315!2d-58.563057985151325!3d-34.53638736144489!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!2m1!1sCalle%20148%20N%C2%B02172%20(ex%20Moreno%20730)%20Villa%20Ballester.!5e0!3m2!1ses!2sve!4v1629072236811!5m2!1ses!2sve" height="428" style="border:0; width:100%;" allowfullscreen="" loading="lazy" ></iframe>
<div class="my-5">
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
        <form action="{{ route('send-contact') }}" method="post">
            @csrf
            <div class="row">
                <div class="col-sm-12 col-md-4 pe-md-5 pe-sm-0">
                    <h3 class="text-blue text-uppercase mb-3 fw-bold font-size-20">Contacto</h3>
                    <p class="mb-5" style="font-weight: 500;">Para más información comuníquese con nuestros especialistas vía email o llenando el formulario a continuación</p>
                    @php 
                        $telephone1 = Str::of($data->phone1)->explode('|');
                        $telephone2 = Str::of($data->phone2)->explode('|');
                        $telephone3 = Str::of($data->phone3)->explode('|');
                    @endphp
                    <div class="d-flex mb-3">
                        <i style="width: 40px;" class="fas fa-map-marker-alt text-purple2 font-size-30 d-block mb-3"></i>
                        <div>
                            <h4 class="text-purple2 text-uppercase font-size-18 fw-bold">dirección</h4>
                            <span class="d-block"> {{ $data->address }}</span>
                        </div>
                    </div>
                    <div class="d-flex mb-3">
                        <i style="width: 40px;" class="fas fa-phone-alt text-purple2 font-size-30 d-block mb-3"></i>
                        <div>
                            <h4 class="text-purple2 text-uppercase font-size-18 fw-bold">teléfonos</h4>
                            <span class="d-block">{{ $telephone1[1] }}</span>  
                            <span class="d-block">{{ $telephone2[1] }}</span>
                        </div>                    
                    </div>
                    <div class="d-flex mb-3">
                        <i style="width: 40px;" class="fab fa-whatsapp text-purple2 font-size-30 d-block mb-3"></i>
                        <div>
                            <h4 class="text-purple2 text-uppercase font-size-18 fw-bold">whatsapp</h4>
                            <span class="d-block">{{ $telephone3[1] }}</span>  
                        </div>                    
                    </div>
                    <div class="d-flex mb-3">
                        <i style="width: 40px;" class="fas fa-envelope text-purple2 font-size-30 d-block mb-3"></i>
                        <div>
                            <h4 class="text-purple2 text-uppercase font-size-18 fw-bold">Email</h4>
                            <span class="d-block">{{ $data->email }}</span>  
                        </div>                    
                    </div>
                </div>
                <div class="col-sm-12 col-md-8">
                    <div class="row">
                        <div class="col-sm-12 col-md-6 mb-3">
                            <div class="form-group">
                                <input type="text" name="name" placeholder="Ingresar nombre *" value="{{ old('name') }}" class="form-control font-size-14">
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6 mb-sm-3 mb-sm-3">
                            <div class="form-group">
                                <input type="email" name="email" placeholder="Ingresar su correo electrónico *" value="{{old('email')}}" class="form-control font-size-14">
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6 mb-3">
                            <div class="form-group">
                                <input type="text" name="phone" placeholder="Ingrese tu teléfono *" value="{{ old('phone') }}" class="form-control font-size-14">
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6 mb-sm-3">
                            <div class="form-group">
                                <input type="text" name="company" placeholder="Empresa" value="{{ old('company') }}" class="form-control font-size-14">
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
                        <div class="col-sm-12 mb-sm-3 mb-sm-3">
                            <div class="form-group">
                                <textarea name="mensaje" class="form-control font-size-14" placeholder="Escriba su mensaje ..." cols="30" rows="13"></textarea>
                            </div>
                        </div>
                        <div class="col-sm-12 mb-sm-3 mb-sm-3 text-end">
                            <button type="submit" class="text-uppercase btn bg-blue fw-bold font-size-14 py-2 px-4 rounded-pill mb-sm-3 mb-md-0 text-white">Enviar <i class="fas fa-chevron-right"></i></button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
@push('head')
    <style>
        input{
            padding: 15px !important;
        }
        input:focus, textarea:focus{
            border: 1px solid #3C284F !important;
        }
    </style>
@endpush