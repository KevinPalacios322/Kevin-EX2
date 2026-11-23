<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Iniciar sesión</title>
</head>
<body>
    <h1>Iniciar sesión</h1>

    @if ($errors->any())
        <p role="alert">{{ $errors->first() }}</p>
    @endif

    <form method="POST" action="{{ route('login.store') }}">
        @csrf

        <div>
            <label for="usuario">Usuario</label>
            <input id="usuario" type="text" name="usuario" value="{{ old('usuario') }}" autocomplete="username" required autofocus>
        </div>

        <div>
            <label for="password">Contraseña</label>
            <input id="password" type="password" name="password" autocomplete="current-password" required>
        </div>

        <button type="submit">Iniciar sesión</button>
    </form>

    
</body>
</html>
