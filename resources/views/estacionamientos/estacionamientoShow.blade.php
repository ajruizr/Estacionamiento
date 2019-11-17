@extends('layouts.sbadmin')

@section('content')

<!-- ============================================================== -->
<!-- striped table -->
<!-- ============================================================== -->
<div class="col-xl-9 col-lg-6 col-md-12 col-sm-12 col-12">
    <div class="card">
        <h5 class="card-header">Estacionamiento</h5>
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
    @if(isset($estacionamiento->lugars))
        <div class="card">
            <h5 class="card-header">Lugares</h5>
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">id</th>
                            <th scope="col">discapacitado</th>
                            <th scope="col">disponible</th>
                            <th scope="col">Fecha de Creacion</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                            @foreach( $estacionamiento->lugars as $lugar)
                            <tr>
                                <td>{{$lugar->id}}</td>
                                
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
                                <td>{{$lugar->created_at}}</td>
                                <td><a href="{{ route('lugar.show',$lugar->id)}}" class="btn btn-outline-info">Detalle</a></td>
                            </tr>
                            @endforeach
                            
                        
                    </tbody>
                </table>
                <ul>
                    
                </ul>
            </div>
        </div>
    @else
        <p class="h5">No hay lugares en el estacionamiento</p>
        <br>
    @endif
</div>
<div>
    <div class="col-7">
        <a href="{{ route('lugar.create')}}" class="btn btn-dark">Crear un nuevo lugar</a>
    </div>
    <br>
    <br>
    <div class="col-5">
        <a href="{{ route('estacionamiento.index')}}" class="btn btn-primary btn-lg btn-block">Regresar</a>
    </div>
</div>
<!-- ============================================================== -->
<!-- end striped table -->
<!-- ============================================================== -->
@endsection
