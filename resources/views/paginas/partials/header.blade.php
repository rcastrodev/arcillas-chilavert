<header class="header bg-purple2 d-sm-none d-md-block">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="row">
                    <div class="data-empresa col-sm-12 col-md-6 col-xxl-6 d-flex align-items-center justify-content-between flex-wrap text-white">
                        @php 
                        $telephone1 = Str::of($data->phone1)->explode('|');
                        $telephone3 = Str::of($data->phone3)->explode('|');
                        @endphp
                        @if (count($telephone1) > 1)
                            <span class="mb-xs-2 mb-md-0">
                                <i class="fas fa-phone-alt text-blue font-size-13 me-2"></i> 
                                <a href="tel:{{$telephone1[0]}}" class="text-white text-decoration-none font-size-13">{{$telephone1[1]}}</a>
                            </span>
                        @endif
                        <a href="mailto:{{ $data->email }}" class="mb-xs-2 mb-md-0 text-white text-decoration-none font-size-13">
                            <i class="fas fa-envelope text-blue font-size-13 me-2"></i> {{ $data->email }}
                        </a>
                        @if (count($telephone3) > 1)
                            <span class="mb-xs-2 mb-md-0">
                                <i class="fab fa-whatsapp text-blue font-size-13 me-2"></i> 
                                <a href="https://wa.me/{{$telephone3[0]}}" class="text-white text-decoration-none font-size-13">{{$telephone3[1]}}</a>
                            </span>
                        @endif
                    </div>
                    <div class="col-sm-12 col-md-6 col-xxl-6 d-flex justify-content-end redes-sociales">
                        <a href="{{ route('solicitud-de-presupuesto') }}" class="text-uppercase text-white py-2 px-3 @if(Request::is('solicitud-de-presupuesto')) text-blue bg-light @endif">solicitud de presupuesto</a>
                        <a href="{{$data->facebook}}" class="font-size-13 bg-blue py-2 px-3"><i class="fab fa-facebook-f text-white"></i></a>
                        <a href="{{$data->instagram}}" class="bg-blue py-2 px-3"><i class="fab fa-instagram font-size-13 text-white"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<nav class="navbar rbg-dark navbar-expand-lg navbar-light w-100" style="z-index: 10">
    <div class="container">
        <a class="navbar-brand" href="{{ route('index') }}">
            <img src="{{ asset($data->logo_header) }}" class="img-fluid logo-header">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end text-uppercase" id="navbarNav">
            <ul class="navbar-nav position-relative">
                <li class="nav-item @if(Request::is('/')) position-relative @endif">
                    <a class="nav-link text-dark font-size-13 @if(Request::is('/')) active @endif" href="{{ route('index') }}">Home</a>
                </li>
                <li class="nav-item @if(Request::is('empresa')) position-relative @endif">
                    <a class="nav-link text-dark font-size-13 @if(Request::is('empresa')) active @endif" href="{{ route('empresa') }}">Empresa</a>
                </li>
                <li class="nav-item @if(Request::is('productos') || Request::is('producto/*') || Request::is('categoria/*')) position-relative @endif">
                    <a class="nav-link text-dark font-size-13 @if(Request::is('productos') || Request::is('producto/*') || Request::is('categoria/*')) active @endif" href="{{ route('productos') }}">Productos</a>
                </li>
                <li class="nav-item d-sm-block d-md-none @if(Request::is('solicitud-de-presupuesto')) position-relative @endif">
                    <a class="nav-link text-dark font-size-13 @if(Request::is('solicitud-de-presupuesto')) active @endif" href="{{ route('solicitud-de-presupuesto') }}" >Solicitud de presupuesto</a>
                </li>
                <li class="nav-item @if(Request::is('contacto')) position-relative @endif">
                    <a class="nav-link text-dark font-size-13 @if(Request::is('contacto')) active @endif" href="{{ route('contacto') }}" >Contacto</a>
                </li>
                <li class="nav-item searchHedader d-sm-none d-md-block" style="min-width: 40px;">
                    <form action="{{ route('productos') }}" method="get" class="position-sm-static rposition" style="right: 0px;">
                        <div class="input-group">
                            <input type="text" class="form-control p-0" name="b">
                            <button class="nav-link text-dark font-size-13 btn">
                                <i class="fas fa-search text-blue"></i>
                            </button>
                        </div>
                    </form>
                </li>
            </ul>
        </div>
    </div>
</nav>  
