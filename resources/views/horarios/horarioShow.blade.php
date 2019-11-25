@extends('layouts.sbadmin')

@section('content')

<!-- ============================================================== -->
<!-- striped table -->
<!-- ============================================================== -->
<div class="col-xl-9 col-lg-6 col-md-12 col-sm-12 col-12">
    <div class="card">
        <h5 class="card-header">Horario</h5>
        <div class="card-body">
            <h3>Detalle: {{ $horario->horario }}</h3>
                <ul>
                  @foreach($horario->lugars as $lugar)
                    <li>{{ $lugar->id }}</li>
                  @endforeach
                </ul>

                {!! Form::model($horario, ['route' => ['horario.destroy', $horario->id], 'method' => 'DELETE']) !!}
                    {!! Form::submit('Borrar', ['class' => 'bnt btn-sm btn-danger']) !!}
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
