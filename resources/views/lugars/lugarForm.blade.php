@extends('layouts.sbadmin')

@section('content')
<div class="card">
    @if(isset($lugar))
        <h5 class="card-header">Editar Lugar</h5>
    @else
        <h5 class="card-header">Agregar lugar</h5>
    @endif
    <div class="card-body">
        @if(isset($lugar))
            <!--<form action= "{{ route('lugar.update', $lugar->id) }}" method="POST">-->
            <!--<input type="hidden" value="PATCH" name="_metod"> Esto es para truckear y no se confunda a usar la misma ruta-->
            <!--@method('PATCH') es quivalente al de arriba-->
            {!! Form::model($lugar,['route' =>['lugar.update', $lugar->id], 'method' => 'PATCH']) !!}
        @else
            <!--<form action= "{{ route('lugar.store') }}" method="POST">-->
            {!! Form::open(['route' =>'lugar.store']) !!}
        @endif
            
            <div class="form group">
                {!! Form::label('estacionamiento_id', 'Seleccione al estacionamiento que pertenece') !!}
                {!! Form::select('estacionamiento_id',$estacionamientos, null,['class'=>'form-control']) !!}
            </div>
            <br>
            
            <div class="form group">
                {!! Form::label('discapacitado', '¿Es lugar para discapacitados?') !!}
                <br>
                <label class="custom-control custom-radio custom-control-inline">
                    <input type="radio" name="discapacitado" checked="" class="custom-control-input" value="0"><span class="custom-control-label">No</span>
                </label>
                <label class="custom-control custom-radio custom-control-inline">
                    <input type="radio" name="discapacitado" class="custom-control-input" value="1"><span class="custom-control-label">Si</span>
                </label>
            </div>

            <div class="form group">
                <p class="text-right">
                    <button type="submit" class="btn btn-space btn-primary">Submit</button>
                    <a href="{{ route('lugar.index')}}" class="btn btn-danger">Cancel</a>
                </p>
            </div>

        {!! Form::close() !!}
    </div>
</div>
@endsection