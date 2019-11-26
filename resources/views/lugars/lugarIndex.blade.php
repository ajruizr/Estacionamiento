@extends('layouts.sbadmin')

@section('content')

<!-- ============================================================== -->
<!-- striped table -->
<!-- ============================================================== -->
<div class="col-xl-9 col-lg-6 col-md-12 col-sm-12 col-12">
    <div class="card">
        <h5 class="card-header">lugares en Estacionamientos</h5>
        <div class="card-body">
            {{ $lugars->links() }}
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">id</th>
                        <th scope="col">Estacionamiento que pertenece</th>
                        <th scope="col">Discapacitado</th>
                        <th scope="col">Disponible</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($lugars ?? '' as $lugar)
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

                        <td><a href="{{ route('lugar.show',$lugar->id)}}" class="btn btn-outline-info">Detalle</a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $lugars->links() }}
        </div>
    </div>
</div>
<div class="col-7">
    <a href="{{ route('lugar.create')}}" class="btn btn-primary btn-lg btn-block">Agregar lugar</a>
</div>
<!-- ============================================================== -->
<!-- end striped table -->
<!-- ============================================================== -->
@endsection 