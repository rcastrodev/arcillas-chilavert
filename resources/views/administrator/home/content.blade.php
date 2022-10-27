@extends('adminlte::page')
@section('title', 'Contenido home')
@section('content_header')
    <div class="d-flex">
        <h1 class="mr-3">Contenido del home</h1>
        <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modal-create-element">crear Slider</button>
    </div>
@stop
@section('content')
<div class="row mb-5">
    <div class="col-sm-12">
        <h3>Sliders</h3>
        <table id="page_table_slider" class="table">
            <thead>
                <tr>
                    <th>Orden</th>
                    <th>Imagen</th>
                    <th>logo</th>
                    <th>Título</th>
                    <th>Acciones</th>
                </tr>
            </thead>
        </table>
    </div>
</div>
@if ($section2)
    <form action="{{ route('home.content.update-info') }}" class="mb-3" data-async="no" method="post" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="id" value="{{ $section2->id }}">
        <div class="form-group">
            <label for="">Título</label>
            <input type="text" name="content_1" class="form-control" value="{{ $section2->content_1 }}">
        </div>
        <div class="form-group">
            <label for="">Contenido</label>
            <textarea name="content_2" class="ckeditor" cols="30" rows="10">{{ $section2->content_2 }}</textarea>
        </div>
        @if (Storage::disk('custom')->url($section2->image))
            <img src="{{ asset($section2->image) }}" alt="" width="300">
        @endif
        <div class="form-group">
            <label>Imagen</label>
            <input type="file" name="image" class="form-control-file">
        </div>
        <button type="submit" class="btn btn-sm btn-primary">Actualizar</button>
    </form>
@endif
@includeIf('administrator.home.modals.create')
@includeIf('administrator.home.modals.update')
@stop
@section('css')
    <meta name="_token" content="{{csrf_token()}}">
    <meta name="url" content="{{route('home.content')}}">
    <meta name="content_find" content="{{route('content')}}">
    <link rel="stylesheet" href="{{ asset('css/admin/style.css') }}">
@stop

@section('js')
    <script src="{{ asset('vendor/ckeditor/ckeditor.js') }}"></script>
    <script src="{{ asset('js/axios.js') }}"></script>
    <script src="{{ asset('js/admin/index.js') }}"></script>
    <script src="{{ asset('js/admin/home/index.js') }}"></script>
@stop

