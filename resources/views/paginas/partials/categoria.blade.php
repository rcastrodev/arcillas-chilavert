<div>
    <div class="position-relative bg-white">  
        <a href="{{ route('categoria', ['id'=> $c->id ]) }}" class="mas position-absolute text-decoration-none font-size-40 text-white fw-light">+</a>
        @if ($c->image)
            <img src="{{ asset($c->image) }}" class="img-fluid img-product" style="">
        @else
            <img src="{{ asset('images/default.jpg') }}" class="img-fluid img-product" style="">
        @endif
    </div>
    <div class="card-body ps-0">
        <p class="card-text mb-0">
            <a href="{{ route('categoria', ['id'=> $c->id ]) }}" class="font-size-15 text-white">{{$c->name}}</a>
        </p>
    </div>
</div>