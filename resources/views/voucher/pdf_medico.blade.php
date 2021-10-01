<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>VOUCHER</title>
</head>
<body>

    <div id="content" class="container">
        <div id="header" style="text-align: right">
            <img src="{{public_path('imagenes/logo.png')}}" alt="logo" width="200px">
        </div>
        <h3 style="text-align: center">VOUCHER</h3>
        <div class="container">
            <div class="card card-dark">
                <div class="card-body">
                    <div class="card card-dark"> 
                        <div class="card-body">
                            <div class="row">
                            @foreach ($tipo_estudios as $tipo)
                                    <div class="col-12" style="padding-bottom: 2%;">
                                        <div class=""> 
                                            {{ $tipo->nombre}}
                                            <ul> 
                                                <div class="row" style="padding: 1%;">
                                                    @foreach ($voucher->vouchersEstudios as $item)
                                                        @if ($item->estudio->tipo_estudio_id == $tipo->id)
                                                            <div class="col-4"><li>{{ strtoupper($item->estudio->nombre)}}</li> </div>
                                                        @endif
                                                    @endforeach
                                                </div>
                                            </ul>
                                        </div>
                                    </div>
                            @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> 
</body>
</html>