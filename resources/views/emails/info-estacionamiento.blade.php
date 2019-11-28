<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<link rel="stylesheet" href="{{asset('../assets/vendor/bootstrap/css/bootstrap.min.css')}}">
<link href="{{asset('../assets/vendor/fonts/circular-std/style.css')}}" rel="stylesheet">
<link rel="stylesheet" href="{{asset('../assets/libs/css/style.css')}}">
<link rel="stylesheet" href="{{asset('../assets/vendor/fonts/fontawesome/css/fontawesome-all.css')}}">
<body>
    
    <a class="navbar-brand" href="/"><i class="fas fa-bullseye"></i>EstacionaPark  <i class="fas fa-bus"></i></a>
    <h2>Informacion de estacionamiento {{ $estacionamiento->nombre}}</h2>

    @if (session('status'))
        <p class="lead">Estimando(a) {{ Auth::user()->name }}</p>
    @else
        <p class="lead">Estimando(a) Usuario</p>
    @endif
    <p class="lead">
        Se le envia este correo debido a que ha solicitado informacion mas detallada sobre el estacionamiento: {{ $estacionamiento->nombre}} .<br>
        Le informamos lo siguiente respecto al estacionamiento:<br>
    </p>
        <ul class="list-unstyled arrow">
            <li>Nombre actual del estacionamiento: {{ $estacionamiento->nombre}}.</li>
            <li>Actualmente se encuentra registrado en nuestra base de datos con el id : {{ $estacionamiento->id}}.</li>
            <li>Registrado el dia: {{ $estacionamiento->created_at}}.</li>
            <li>Esta ubicado actualmente en: {{ $estacionamiento->lugar}}.</li>
        </ul>
    <p class="lead">
        Sin mas por el momento, agradecemos su interés en nosotros.<br><br>
        ATTE<br>
        EstacionaPark.
    </p>
    
</body>
</html>
