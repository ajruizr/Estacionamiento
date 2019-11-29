@extends('layouts.sbadmin')

@section('content')
<div class="card">
    @if(isset($horario))
        <h5 class="card-header">Editar horario</h5>
    @else
        <h5 class="card-header">Agregar horario</h5>
    @endif
    <div class="card-body">
        @if(isset($horario))
            <!--<form action= "{{ route('horario.update', $horario->id) }}" method="POST">-->
            <!--<input type="hidden" value="PATCH" name="_metod"> Esto es para truckear y no se confunda a usar la misma ruta-->
            <!--@method('PATCH') es quivalente al de arriba-->
            {!! Form::model($horario,['route' =>['horario.update', $horario->id], 'method' => 'PATCH']) !!}
        @else
            <!--<form action= "{{ route('horario.store') }}" method="POST">-->
            {!! Form::open(['route' =>'horario.store']) !!}
        @endif
            <div class="form-group">
                {!! Form::label('horario', 'Horario de servicio (HI-HF)') !!}
                {!! Form::text('horario', null, ['class' => 'form-control']) !!}
                @error('horario')
                    <div class="alert alert-danger">Ingrese un horario de servicio para el lugar.</div>
                @enderror
            </div>
            <div class="form-group">
                {!! Form::label('lugars_id[]', 'Lugares Disponibles (ID)') !!}
                {!! Form::select('lugars_id[]', $lugars, $seleccionados ?? null, ['class' => 'form-control', 'multiple']) !!}
                @error('lugars_id')
                    <div class="alert alert-danger">Seleccione al menos 1 lugar.</div>
                @enderror
            </div>
            <div class="col-sm-6 pl-0">
                <p class="text-right">
                    <button type="submit" class="btn btn-space btn-primary">Submit</button>
                    <a href="{{ route('horario.index')}}" class="btn btn-danger">Cancel</a>
                </p>
            </div>
        {!! Form::close() !!}
    </div>
</div>
@endsection