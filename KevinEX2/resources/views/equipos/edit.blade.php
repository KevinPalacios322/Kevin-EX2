<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Actualizar equipo</title>
</head>
<body>
    <h1>Actualizar equipo</h1>

    @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form method="POST" action="{{ route('equipos.update', $equipo) }}">
        @csrf
        @method('PUT')

        <div>
            <label for="codigo">Código</label>
            <input id="codigo" name="codigo" value="{{ old('codigo', $equipo->codigo) }}" maxlength="30" required>
        </div>
        <div>
            <label for="nombre">Nombre</label>
            <input id="nombre" name="nombre" value="{{ old('nombre', $equipo->nombre) }}" maxlength="100" required>
        </div>
        <div>
            <label for="marca">Marca</label>
            <input id="marca" name="marca" value="{{ old('marca', $equipo->marca) }}" maxlength="80" required>
        </div>
        <div>
            <label for="fecha_adquisicion">Fecha de adquisición</label>
            <input id="fecha_adquisicion" name="fecha_adquisicion" type="date" value="{{ old('fecha_adquisicion', $equipo->fecha_adquisicion) }}" required>
        </div>
        <div>
            <label for="estado">Estado</label>
            <input id="estado" name="estado" value="{{ old('estado', $equipo->estado) }}" required>
        </div>

        <button type="submit">Guardar cambios</button>
    </form>

    <p><a href="{{ route('equipos.index') }}">Volver al listado</a></p>
</body>
</html>
