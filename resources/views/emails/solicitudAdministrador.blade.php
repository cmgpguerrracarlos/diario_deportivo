<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0">
    <title>Solicitud de {{$tipoUsuario}}</title>
</head>
<body>
    @if($tipoUsuario == 'admin')
     {{$tipoUsuario = "administrador"}}
    @endif
    <p>Se ha reportado una nueva solicitud de {{$tipoUsuario}} el día {{ $usuario->created_at->Format('d/m/Y') }}.</p>
    <p>Estos son los datos del usuario que ha realizado la petición:</p>
    <ul>
        <li>Nombre: {{ $usuario->nombre }}</li>
        <li>Apellido: {{ $usuario->apellido }}</li>
        <li>Username: {{ $usuario->username }}</li>
        <li>Email: {{ $usuario->email }}</li>
    </ul>
</body>
</html>