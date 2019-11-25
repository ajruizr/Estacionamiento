@extends('layouts.sbadmin')

@section('content')

<!-- ============================================================== -->
<!-- striped table -->
<!-- ============================================================== -->
<div class="col-xl-9 col-lg-6 col-md-12 col-sm-12 col-12">
    <div class="card">
        <h5 class="card-header">Horarios Disponibles</h5>
        <div class="card-body">
            {{ $horarios->links() }}
                <table class="table table-striped">
                  <tr>
                    <th>horario</th>
                    <th>lugares</th>
                    <th>Acciones</th>
                  </tr>
                  @foreach($horarios as $horario)
                    <tr>
                      <td>
                          <a href="{{ route('horario.show', $horario->id) }}">
                              {{ $horario->horario }}
                          </a>
                      </td>
                      <td>
                        <ul>
                        @foreach($horario->lugars as $lugar)
                          <li>{{ $lugar->id }}</li>
                        @endforeach
                        </ul>
                      </td>
                    </tr>
                  @endforeach
                </table>
                {{ $horarios->links() }}
        </div>
    </div>
</div>
<div class="col-7">
    <a href="{{ route('horario.create')}}" class="btn btn-primary btn-lg btn-block">Agregar Horario de atencion</a>
</div>
<!-- ============================================================== -->
<!-- end striped table -->
<!-- ============================================================== -->
@endsection