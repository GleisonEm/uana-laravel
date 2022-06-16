<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>
        Documento PDF   
    </title>
    <link rel="stylesheet" href="{{ asset('vendor/adminlte/vendor/bootstrap/dist/css/pdf.css') }}"> 
</head>

<body>
    <div class="row"  align="center">
        <div class="col-md-2 col-sm-2 col-xs-2"> 
            <img src="{{ public_path() . '/assets/img/logo_relatorio.png' }}" alt="" class="img-responsive logo">
        </div>   
        <div class="col-md-6 col-sm-6 col-xs-6"> 
            <p>AGÊNCIA MUNICIPAL DE MEIO AMBIENTE - AMMA</p>
            <p>Rua Antônio Padilha, nº 55, Centro, Petrolina/PE</p>
            <p>Tels.: (87) 3861–4382 / 3866–2779</p>
        </div>   
        <div class="col-md-3 col-sm-3 col-xs-3"> 
            <img src="{{ public_path() . '/assets/img/logo_relatorio1.png' }}" alt="" class="img-responsive logo"> 
        </div>   
    </div>
    
    <br>
    
    <p align="center"><font size="15"><b>{{$title}}</b></font></p>

    <br>

    <div class="row">
        @yield('content')
    </div>

    <div class="row" align="right">
        <h5>Total de registros: {{$total}} </h5>
        <br>
    </div>

</body>
</html>

