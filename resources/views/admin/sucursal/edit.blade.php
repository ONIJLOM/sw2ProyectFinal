@extends('adminlte::page')

@section('title', 'Promociones')

@section('content_header')
<h1>Editar Promocion</h1>
@stop

@section('content')

@if(session('info'))
    <div class="alert alert-success">
        <strong> {{session('info')}}</strong>
    </div>
@endif

<div class="card">
    <div class="card-body">
            
        {!! Form::model($sucursal,['route' => ['admin.sucursal.update', $sucursal->id], 'method' => 'put', 'autocomplete' => 'off']) !!}

        <div class="form-group">
            {!! Form::label('nombre','Nombre') !!}
            {!! Form::text('nombre',null,['class' => 'form-control', 'placeholder' => 'Ingrese el Nombre']) !!}

            @error('nombre')
            <strong class="text-danger">{{ $message }}</strong>
            @enderror
            

            </div>

            <div class="from-group">
            {!! Form::label('direccion','Direccion') !!}
            {!! Form::text('direccion',null,['class' => 'form-control', 'placeholder' => 'Ingrese la direccion']) !!}

            @error('direccion')
            <strong class="text-danger">{{ $message }}</strong>               
            @enderror
            
            </div>
            
          
            <br>
                                                      
            <div class="form-group">
                <button class="btn btn-primary" type="submit" rel="tooltip">
                    <i class="material-icons fa fa-save"> Guardar</i>
                </button>             
            </div>
        {!! Form::close() !!}

    </div>
</div>
<div class="form-group col-md-4">
    <a class="btn btn-danger" href="{{route('admin.sucursal.index')}}">
        <i class="fa fa-arrow-left"> Atras</i>
    </a>   
</div>


@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@livewireStyles
@stop

@section('js')
<script>console.log('hi!')</script>
@livewireScripts
@stop
