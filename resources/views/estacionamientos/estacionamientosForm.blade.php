@extends('layouts.sbadmin')

@section('content')
<div class="card">
    @if(isset($estacionamiento))
        <h5 class="card-header">Editar estacionamiento</h5>
    @else
        <h5 class="card-header">Agregar estacionamiento</h5>
    @endif
    <div class="card-body">
        @if(isset($estacionamiento))
            <!--<form action= "{{ route('estacionamiento.update', $estacionamiento->id) }}" method="POST">-->
            <!--<input type="hidden" value="PATCH" name="_metod"> Esto es para truckear y no se confunda a usar la misma ruta-->
            <!--@method('PATCH') es quivalente al de arriba-->
            {!! Form::model($estacionamiento,['route' =>['estacionamiento.update', $estacionamiento->id], 'method' => 'PATCH']) !!}
        @else
            <!--<form action= "{{ route('estacionamiento.store') }}" method="POST">-->
            {!! Form::open(['route' =>'estacionamiento.store']) !!}
        @endif
            <div class="form-group">

                <!--<label for="inputText1" class="col-form-label">Nombre</label>-->
                {!! Form::label('nombre', 'Ingrese el nombre') !!}
                <!--<input id="inputText1" type="text" class="form-control" placeholder="Ingrese un nombre" name="nombre" value="{{ $estacionamiento->nombre ?? ''}}">-->
                {!! Form::text('nombre', null, ['class'=>'form-control']) !!}
                @error('nombre')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <!--<label for="inputText2" class="col-form-label">Lugar</label>-->
                {!! Form::label('lugar', 'Ingrese el lugar')!!}
                <!--<input id="inputText2" type="text" class="form-control"placeholder="Ingrese una ubicacion" name="lugar" value="{{ $estacionamiento->lugar ?? ''}}">-->
                {!! Form::text('lugar', null, ['class'=>'form-control']) !!}
                @error('lugar')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-sm-6 pl-0">
                <p class="text-right">
                    <button type="submit" class="btn btn-space btn-primary">Submit</button>
                    <a href="{{ route('estacionamiento.index')}}" class="btn btn-danger">Cancel</a>
                </p>
            </div>
        {!! Form::close() !!}
    </div>
</div>
@endsection