@extends('adminlte::page')

@section('title', 'Dueño')

@section('content_header')
<h1>Crear nueva Sucursal</h1>

@stop

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">

                {!! Form::open(['route' => 'admin.sucursal.store', 'autocomplete' => 'off']) !!}

                        <div class="form-group">
                        {!! Form::label('nombre','Nombre') !!}
                        {!! Form::text('nombre',null,['class' => 'form-control', 'placeholder' => 'Ingrese el Nombre']) !!}

                        @error('nombre')
                        <strong class="text-danger">{{ $message }}</strong>
                        @enderror
                        

                        </div>

                        <div class="from-group">
                        {!! Form::label('direccion','Direccion') !!}
                        {!! Form::text('direccion',null,['class' => 'form-control', 'placeholder' => 'Ingrese la direccion ']) !!}

                        @error('direccion')
                        <strong class="text-danger">{{ $message }}</strong>               
                        @enderror
                        
                        </div>
                        
                      
                        <br>
                                                                  
                        <div class="form-group">
                            <button class="btn btn-primary" type="submit" rel="tooltip">
                                <i class="material-icons fa fa-save"> Crear</i>
                            </button>             
                        </div>
                        

                    {!! Form::close() !!}

                    <div class="form-group">
                        <a class="btn btn-danger" href="{{route('admin.sucursal.index')}}">
                            <i class="fa fa-arrow-left"> Atras</i>
                        </a>   
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
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
