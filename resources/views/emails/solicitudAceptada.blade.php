<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    @if($estadoSolicitud == true)
    @if ($tipoUsuario == "Administrador")
        {{ $tipoUsuario = "Administradores" }}
    @endif
    @if ($tipoUsuario == "Editor")
        {{ $tipoUsuario = "Editores" }}
    @endif
        <h2>Se ha procesado tu solicitud y ya sos parte del equipo de {{$tipoUsuario}} de nuestra página</h2>
        <h1 class="bg-light text-dark lead">Bienvenido/a</h1>
    @else
        <h2>Se ha procesado tu solicitud y ha sido rechazada para {{$tipoUsuario}} de la página</h2>
    @endif
</body>

</html>