@extends('paginas.partials.app')
@section('content')
@if ($categories->count())
<div class="bg-purple py-sm-2 py-md-5">
    <div class="container">
        <div class="">
            <section class="producto row font-size-14">
                @foreach ($categories as $c)
                    <div class="col-sm-12 col-md-4 mb-3">
                        @include('paginas.partials.categoria', ['c' => $c])
                    </div>
                @endforeach                
            </section>    
        </div>
    </div>
</div>       
@endif
@if (count($products))
<div class="bg-purple py-sm-2 py-md-5">
    <div class="container">
        <div class="">
            @if (count($products))
                <section class="producto row font-size-14">
                    @foreach ($products as $p)
                        <div class="col-sm-12 col-md-3 mb-3">
                            @includeIf('paginas.partials.producto', ['p' => $p])
                        </div>
                    @endforeach                
                </section>    
            @else
                <h2 class="text-center my-5">No tenemos productos cargados en la actualidad</h2>
            @endif
        </div>
    </div>
</div> 
@endif

@endsection
@push('scripts')
    <script src="{{ asset('js/pages/product.js') }}"></script>
@endpush
