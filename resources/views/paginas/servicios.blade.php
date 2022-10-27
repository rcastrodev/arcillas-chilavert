@extends('paginas.partials.app')
@section('content')
<div class="contenedor-breadcrumb">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb text-uppercase py-2 font-size-13">
                <li class="breadcrumb-item">
                    <a href="{{ route('index') }}" class="color-azul-oscuro text-decoration-none font-weight-600">inicio</a>
                </li>
                <li class="breadcrumb-item active color-azul-claro" aria-current="page">servicios</li>
            </ol>
        </nav>
    </div>
</div>
@if (! $hasService and !$form->content_1)
    <h2 class="text-center my-5">No tenemos servicios cargados en este momento</h2>
@endif
@if($hasService)
    <div class="">
        <div class="container">
            <div class="row m-sm-0 m-md-5">
                @if (count($contents))
                    @foreach ($contents as $content)
                        <div class="col-sm-12 col-md-4 font-size-14 mb-sm-5 mb-md-0">
                            <div class="d-flex align-items-center mb-4">
                                <div class="me-4 d-flex justify-content-center align-items-center" style="background-color: #0c5fab; height: 60px; width: 60px; border-radius: 100%;">
                                    <img src="{{ asset($content->image) }}" alt="{{$content->content_1}}">
                                </div>
                                <h5 class="font-size-16 font-weight-600 text-capitalize">{{ $content->content_1 }}</h5>
                            </div>
                            <p class="@if($content->id != 13) mb-4 @else m-0 @endif">{{ $content->content_2 }}<br><br></p>
                            <hr class="@if($content->id != 13) mb-4 @else m-0 @endif">
                            <div class="mb-4 font-size-13 fst-italic">{!! $content->content_3 !!}</div>
                            <a href="{{ route('contacto') }}" class="text-uppercase color-azul-oscuro fw-bold text-decoration-none font-size-14">consultar</a>
                        </div>                
                    @endforeach                
                @endif
            </div>
        </div>
    </div>    
@endif
@isset($form)
    <div class="calcular-servicio" style="">
        <div class="container">
            <div class="row py-sm-3 py-md-5">
                <div class="col-sm-12">
                    <h5 class="text-uppercase font-weight-600 font-size-19">{{ $form->content_1 }}</h5>
                </div>
                <div class="col-sm-12 col-md-4 font-size-16">
                    <p>{{ $form->content_2 }}</p>
                </div>
                <form id="fomrCalculate" class="col-sm-12 col-md-8">
                    <div class="row">
                        <div class="col-sm-12 col-md-4 mb-sm-2 mb-md-0">
                            <div class="form-group">
                                <input type="number" name="bags" required class="form-control font-size-11" height="37" placeholder="Cantidad de bolsas (Unidades)">
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-4 mb-sm-2 mb-md-0">
                            <div class="form-group">
                                <input type="number" name="cm" min="35" max="100" required class="form-control font-size-11" height="37" placeholder="Largo de manijas (de 35 a 100 cm)">
                            </div>                       
                        </div>
                        <div class="col-sm-12 col-md-4 mb-sm-3 mb-md-0">
                            <button type="submit" class="btn btn-primary fw-bold py-2 px-5 text-uppercase rounded-pill font-size-13">calcular</button>
                        </div>
                        <div id="message" class="text-uppercase font-weight-600 font-size-19 text-center mt-3"></div>
                    </div>
                </form>
            </div>
        </div>
    </div>    
@endisset
@endsection
@push('scripts')
    <script>
        
        let formCalculate = document.getElementById('fomrCalculate')

        function calculate(e)
        {
            e.preventDefault()
            let bags  = parseInt(this.querySelector('input[name="bags"]').value)
            let cm = parseInt(this.querySelector('input[name="cm"]').value)
            let result = ((bags * cm) * 2) / 100 // de cm a mtrs
            

            let btnSubmit = this.querySelector('button')
            this.reset()
            let contentMessage = document.getElementById('message')
            contentMessage.textContent = `${result} Metros`

            setTimeout(() => {
                contentMessage.textContent = ''
            }, 10000);

        }

        formCalculate.addEventListener('submit', calculate)
    </script>
@endpush