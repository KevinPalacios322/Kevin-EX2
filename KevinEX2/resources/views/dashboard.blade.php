<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Inicio · {{ config('app.name', 'Kevin EX2') }}</title>
    <style>
        * { box-sizing: border-box; }
        body { min-height: 100vh; margin: 0; padding: 32px; color: #f4f5fa; background: #10131c; font-family: Inter, ui-sans-serif, system-ui, sans-serif; }
        header { max-width: 1000px; margin: auto; display: flex; justify-content: space-between; align-items: center; }
        .brand { font-weight: 850; letter-spacing: -.5px; }
        button { padding: 10px 15px; border: 1px solid #ffffff25; border-radius: 10px; color: #f4f5fa; background: #191d29; font: inherit; cursor: pointer; }
        main { max-width: 1000px; margin: 15vh auto 0; }
        .eyebrow { color: #b8f27c; font-size: 12px; font-weight: 700; letter-spacing: 1.5px; text-transform: uppercase; }
        h1 { margin: 12px 0; font-size: clamp(36px, 7vw, 64px); letter-spacing: -3px; }
        p { color: #a8adbd; }
    </style>
</head>
<body>
    <header>
        <div class="brand">K. <span>{{ config('app.name', 'Kevin EX2') }}</span></div>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit">Cerrar sesión</button>
        </form>
    </header>
    <main>
        <div class="eyebrow">Sesión iniciada</div>
        <h1>Hola, {{ auth()->user()->usuario }}.</h1>
        <p>Ya tienes acceso a tu espacio.</p>
    </main>
</body>
</html>
