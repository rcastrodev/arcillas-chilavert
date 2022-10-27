<div class="card producto">
    <div class="position-relative bg-white">  
        <a href="{{ route('producto', ['product'=> $p->id ]) }}" class="mas position-absolute text-decoration-none font-size-40 text-white fw-light">+</a>
        @if (count($p->images))
            <img src="{{ asset($p->images()->first()->image) }}" class="img-fluid img-product" >
        @else
            <img src="{{ asset('images/default.jpg') }}" class="img-fluid img-product">
        @endif
    </div>
    <div class="card-body ps-0">
        <p class="card-text mb-0 text-truncate"><a href="{{ route('producto', ['product'=> $p->id ]) }}" class="font-size-15 text-blue text-uppercase">{{$p->name}}</a></p>
    </div>
</div>