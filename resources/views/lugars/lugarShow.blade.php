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
                        @if($lugar->discapacitado===1)
                            <td>Si</td>
                        @else
                            <td>No</td>
                        @endif
                        @if($lugar->disponible===1)
                            <td>Si</td>
                        @else
                            <td>No</td>
                        @endif
                        
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
        </div>
    </div>
</div>
<div class="col-5">
    <a href="{{ route('estacionamiento.index')}}" class="btn btn-primary btn-lg btn-block">Regresar</a>
</div>
<!-- ============================================================== -->
<!-- end striped table -->
<!-- ============================================================== -->
@endsection
