@extends('adminlte::page')
@section('title', 'Crear producto')
@section('content_header')
    <div class="d-flex">
        <h1 class="mr-3">Crear producto</h1>
        <a href="{{ route('product.content') }}" class="btn btn-sm btn-primary">ver productos</a>
    </div>
@stop
@section('content')
<div class="row">
    @includeIf('administrator.partials.mensaje-exitoso')
    @includeIf('administrator.partials.mensaje-error')
</div>
<form action="{{ route('product.content.store') }}" method="post" enctype="multipart/form-data">
    <div class="card-body row">
        @csrf
        <div class="form-group col-sm-12 col-md-4">
            <label for="">Nombre del producto</label>
            <input type="text" name="name" value="{{old('name')}}" class="form-control" placeholder="Nombre del producto">
        </div>
        <div class="form-group col-sm-12 col-md-3">
            <label>Sub categoría</label>
            <select name="sub_category_id" class="form-control select2">
                @foreach ($subCategories as $sCategory)
                    <option value="{{$sCategory->id}}">{{$sCategory->name}} - {{$sCategory->category->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group col-sm-12 col-md-2">
            <label for="">Orden</label>
            <input type="text" name="order" value="{{old('order')}}" class="form-control" placeholder="Ej AA AB AC">
        </div>
        <div class="form-group col-sm-12 col-md-3">
            <label for="">Peso</label>
            <input type="text" name="weight" value="{{old('weight')}}" placeholder="Ejem 50|25|30|45" class="form-control">
        </div>
        <div class="form-group col-sm-12">
            <label for="">Información adicional</label>
            <input type="text" name="info" value="{{old('info')}}" placeholder="Detalles del producto" class="form-control">
        </div> 
        <div class="form-group col-sm-12">
            <label for="">Descripción</label>
            <input type="text" name="description" value="{{old('description')}}" class="form-control" placeholder="Descripción del producto">
        </div>
        <div class="form-group col-sm-12">
            <label>Ficha técnica</label>
            <input type="file" name="extra" class="form-control-file">
        </div> 
        <div class="form-group col-sm-12">
            <small>la imagen debe ser al menos 400x290</small> 
        </div>
        @for ($i = 1; $i <= 3; $i++)
        <div class="form-group col-sm-12 col-md-4">
            <label for="image{{$i}}">imagen {{$i}}</label>
            <input type="file" name="images[]" class="form-control-file" id="image{{$i}}">
        </div>           
        @endfor
    </div>
  <!-- /.card-body -->
    <div class="card-footer">
        <button type="submit" class="btn btn-primary">Guardar</button>
    </div>
</form>
@stop
@section('css')
    <link rel="stylesheet" href="{{ asset('css/admin/style.css') }}">
@stop
@section('js')
    <script>
        $('document').ready(function(){
            $('.select2').select2()
        })
    </script>
@stop

