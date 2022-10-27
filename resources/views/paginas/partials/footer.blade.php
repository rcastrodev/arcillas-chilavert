@php 
    $telephone1 = Str::of($data->phone1)->explode('|');
    $telephone2 = Str::of($data->phone2)->explode('|');
    $telephone3 = Str::of($data->phone3)->explode('|');
@endphp
<footer class="font-size-14 text-sm-center text-md-start bg-purple2">
    <div class="row justify-content-between container mx-auto">
        <div class="col-sm-12 col-md-2 py-sm-3 py-md-4 plogo-footer" style="">
            <a href="{{ route('index') }}"><img src="{{ asset($data->logo_footer) }}"></a>
        </div>
        <div class="col-sm-12 col-md-4 py-sm-2 py-md-5 d-sm-none d-md-block">
            <div class="row justify-content-between">
                <div class="col-sm-12">    
                    <div class="row">
                        <div class="col-sm-12">
                            <h6 class="text-uppercase text-white fw-bold mb-3">dirección</h6>
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <a href="{{ route('index') }}" class="d-block text-uppercase text-decoration-none text-light mb-1 font-size-15">Home</a>
                            <a href="{{ route('empresa') }}" class="d-block text-uppercase text-decoration-none text-light mb-1 font-size-15">Empresa</a>
                            <a href="{{ route('productos') }}" class="d-block text-uppercase text-decoration-none text-light mb-1 font-size-15">Productos</a>
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <a href="{{ route('contacto') }}" class="d-block text-uppercase text-decoration-none text-light mb-1 font-size-15">Contacto</a>
                            <a href="{{ route('solicitud-de-presupuesto') }}" class="d-block text-uppercase text-decoration-none text-light mb-1 font-size-15">Solicitud de presupuesto</a>
                        </div>
                        <div class="mt-5">
                            <a href="{{ $data->instagram }}" class="px-2 font-size-20"><i class="fab fa-instagram text-white"></i></a>
                            <a href="{{ $data->facebook }}" class="px-2 font-size-20"><i class="fab fa-facebook-f text-white"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-12 col-md-6 font-size-13 px-sm-3 px-md-0 py-sm-3 py-md-5">
            <h6 class="text-uppercase text-white fw-bold mb-3">ARCILLAS CHILAVERT S.A.</h6>
            <div class="row">
                <div class="d-flex align-items-start mb-3 col-sm-12 col-md-6">
                    <i class="fas fa-map-marker-alt text-white d-block me-3 mb-3 text-blue font-size-24"></i>
                    <div class="text-start">
                        <strong class="text-uppercase text-blue d-block fw-bold">dirección</strong>
                        <address class="d-block text-light m-0"> {{ $data->address }}</address>
                    </div>   
                </div>
                <div class="d-flex align-items-start col-sm-12 col-md-6">
                    <i class="fas fa-phone-alt text-white d-block me-3 mb-3 text-blue font-size-24"></i>
                    <div class="text-start">
                        <strong class="text-uppercase text-blue d-block fw-bold">teléfonos</strong>
                        @if (count($telephone1) > 1)
                        <a href="tel:{{ $telephone1[0] }}" class="text-light text-decoration-none d-block">{{ $telephone1[1] }}</a>
                        @endif
                        @if (count($telephone2) > 1)
                            <a href="tel:{{ $telephone2[0] }}" class="text-light text-decoration-none">{{ $telephone2[1] }}</a>
                        @endif 
                    </div>  
                </div>
                <div class="d-flex align-items-start col-sm-12 col-md-6">
                    <i class="far fa-envelope text-white d-block me-3 mb-3 fw-bold text-blue font-size-24"></i><span class="d-block"></span>
                    <div class="text-start">
                        <strong class="text-uppercase text-blue d-block fw-bold">email</strong>
                        <a href="mailto:{{ $data->email }}" class="text-light text-decoration-none">{{ $data->email }}</a> 
                    </div>                  
                </div>
                @if (count($telephone1) > 1)
                <div class="d-flex align-items-start col-sm-12 col-md-6">
                    <i class="fab fa-whatsapp text-white d-block me-3 mb-3 text-blue font-size-24"></i>
                    <div class="text-start">
                        <strong class="text-uppercase text-blue d-block fw-bold">whatsapp</strong>
                        <a href="https://wa.me/{{$telephone3[0]}}" class="text-light text-decoration-none">{{$telephone3[1]}}</a>
                    </div>  
                </div>
                @endif
            </div>
        </div>
    </div>
</footer>

