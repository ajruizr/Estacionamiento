@extends('layouts.sbadmin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"></h2>Bienvenid@</h2></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    Bienvenido de nuevo {{ Auth::user()->name }} <br>
                    Estas logeado con el correo {{ Auth::user()->email }}!
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
