<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Equipos</title>
</head>
<body>
    <h1>Equipos</h1>

    @if (session('mensaje'))
        <p>{{ session('mensaje') }}</p>
    @endif

    <p><a href="{{ route('equipos.create') }}">Crear equipo</a></p>

    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit">Cerrar sesión</button>
    </form>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Código</th>
                <th>Nombre</th>
                <th>Marca</th>
                <th>Fecha de adquisición</th>
                <th>Estado</th>
                <th>Creado</th>
                <th>Actualizado</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($equipos as $equipo)
                <tr>
                    <td>{{ $equipo->id }}</td>
                    <td>{{ $equipo->codigo }}</td>
                    <td>{{ $equipo->nombre }}</td>
                    <td>{{ $equipo->marca }}</td>
                    <td>{{ $equipo->fecha_adquisicion }}</td>
                    <td>{{ $equipo->estado }}</td>
                    <td>{{ $equipo->created_at }}</td>
                    <td>{{ $equipo->updated_at }}</td>
                    <td>
                        <a href="{{ route('equipos.edit', $equipo) }}">Actualizar</a>
                        <form method="POST" action="{{ route('equipos.destroy', $equipo) }}" onsubmit="return confirm('¿Seguro que deseas eliminar este equipo?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="9">No hay equipos registrados.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</body>
</html>
