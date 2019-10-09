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
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">{{$estacionamiento->id}}</th>
                        <td>{{$estacionamiento->nombre}}</td>
                        <td>{{$estacionamiento->lugar}}</td>
                        <td>{{$estacionamiento->created_at}}</td>
                        <td><a href="{{ route ('estacionamiento.edit',$estacionamiento->id) }}" class="btn btn-outline-primary">Editar</a></td>
                        <td>
                        <form action="{{ route ('estacionamiento.destroy',$estacionamiento->id) }}" method="POST">
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
<!-- ============================================================== -->
<!-- end striped table -->
<!-- ============================================================== -->
@endsection
