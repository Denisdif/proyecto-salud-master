<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    Riesgos <br>
    {{$voucher->aptitud->riesgos}} <br>
    <br>
    Estudios <br>
    @foreach ($voucher->estudiosCargar() as $item)
        {{$item->estudio->nombre}} <br>
    @endforeach
    <br>

</body>
</html>