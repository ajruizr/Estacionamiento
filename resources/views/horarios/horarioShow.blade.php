@extends('layouts.sbadmin')

@section('content')

<!-- ============================================================== -->
<!-- striped table -->
<!-- ============================================================== -->
<div class="col-xl-9 col-lg-6 col-md-12 col-sm-12 col-12">
    <div class="card">
        <h5 class="card-header">Horario</h5>
        <div class="card-body">
            <h3>Detalle: Horario de {{ $horario->horario }}</h3>
                <p class="lead">Lugares que tiene:</p>
                <ul>
                  @foreach($horario->lugars as $lugar)
                    <li>{{ $lugar->id }}</li>
                  @endforeach
                </ul>
                <a href="{{ route ('horario.edit', $horario->id) }}" class="btn btn-outline-primary">Editar</a></td>
                {!! Form::model($horario, ['route' => ['horario.destroy', $horario->id], 'method' => 'DELETE']) !!}
                    {!! Form::submit('Borrar', ['class' => 'btn btn-outline-danger']) !!}
                {!! Form::close() !!}
        </div>
    </div>
    
</div>
<div>
    <div class="col-5">
        <a href="{{ route('horario.index')}}" class="btn btn-primary btn-lg btn-block">Regresar</a>
    </div>
</div>
<!-- ============================================================== -->
<!-- end striped table -->
<!-- ============================================================== -->
@endsection
