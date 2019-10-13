@extends('layouts.sbadmin')

@section('content')

<!-- ============================================================== -->
<!-- striped table -->
<!-- ============================================================== -->
<div class="col-xl-9 col-lg-6 col-md-12 col-sm-12 col-12">
    <div class="card">
        <h5 class="card-header">Esctacionamientos</h5>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">id</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Lugar</th>
                        <th scope="col">Fecha de Creacion</th>
                        <th scope="col">Info</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($estacionamientos as $estacionamiento)
                    <tr>
                        <th scope="row">{{$estacionamiento->id}}</th>
                        <td>{{$estacionamiento->nombre}}</td>
                        <td>{{$estacionamiento->lugar}}</td>
                        <td>{{$estacionamiento->created_at}}</td>
                        <td><a href="{{ route('estacionamiento.show',$estacionamiento->id)}}" class="btn btn-outline-info">Detalle</a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
<div class="col-7">
    <a href="{{ route('estacionamiento.create')}}" class="btn btn-primary btn-lg btn-block">Agregar estacionamiento</a>
</div>
<!-- ============================================================== -->
<!-- end striped table -->
<!-- ============================================================== -->
@endsection