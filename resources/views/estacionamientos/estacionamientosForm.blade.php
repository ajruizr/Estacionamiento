@extends('layouts.sbadmin')

@section('content')
<div class="card">
    <h5 class="card-header">Basic Form</h5>
    <div class="card-body">
        @if(isset($estacionamiento))
            <form action= "{{ route('estacionamiento.update', $estacionamiento->id) }}" method="POST">
            <!--<input type="hidden" value="PATCH" name="_metod"> Esto es para truckear y no se confunda a usar la misma ruta-->
            @method('PATCH')<!-- es quivalente al de arriba-->
        @else
            <form action= "{{ route('estacionamiento.store') }}" method="POST">
        @endif

        @csrf
            <div class="form-group">
                <label for="inputText1" class="col-form-label">Nombre</label>
                <input id="inputText1" type="text" class="form-control" placeholder="Ingrese un nombre" name="nombre" value="{{ $estacionamiento->nombre ?? ''}}">
            </div>
            <div class="form-group">
                <label for="inputText2" class="col-form-label">Lugar</label>
                <input id="inputText2" type="text" class="form-control"placeholder="Ingrese una ubicacion" name="lugar" value="{{ $estacionamiento->lugar ?? ''}}">
            </div>
            <div class="col-sm-6 pl-0">
                <p class="text-right">
                    <button type="submit" class="btn btn-space btn-primary">Submit</button>
                    <button class="btn btn-space btn-secondary">Cancel</button>
                </p>
            </div>
        </form>
    </div>
</div>
@endsection