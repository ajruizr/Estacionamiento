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
                        <th scope="col">estacionamiento</th>
                        <th scope="col">Disponible</th>
                        <th scope="col">Discapacitado</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">{{$lugar->id}}</th>
                        <td>{{$lugar->estacionamiento->nombre}}</td>
                        <td>{{$lugar->disponible}}</td>
                        <td>{{$lugar->discapacitado}}</td>
                        <td><a href="{{ route ('lugar.edit',$lugar->id) }}" class="btn btn-outline-primary">Editar</a></td>
                        <td>
                        <form action="{{ route ('lugar.destroy',$lugar->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type=submit class="btn btn-outline-danger" onclick="return confirm('¿Esta seguro de que desea eliminar?');">Eliminar</button>
                        </form>
                        </td>   
                    </tr>
                </tbody>
            </table>
            <ul>
                @foreach($lugar->lugar as $lugar)
                    <li>{{$lugar->id}}</li>
            </ul>
        </div>
    </div>
</div>
<div class="col-5">
    <a href="{{ route('lugar.index')}}" class="btn btn-primary btn-lg btn-block">Regresar</a>
</div>
<!-- ============================================================== -->
<!-- end striped table -->
<!-- ============================================================== -->
@endsection
