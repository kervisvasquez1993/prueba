<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Prueba</title>
</head>
<body>
    <h2>{{$user->name}}</h2>
    <p>Has recibido un mensaje</p>
    <a href="{{route('messages.show', $msj->id)}}"> Click Aqui  para ver el mensaje</a>
    <p>Gracias POR USAR NUESTRA APLICACION</p>
</body>
</html>