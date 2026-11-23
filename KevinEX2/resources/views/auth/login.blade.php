       <h1>Iniciar sesión</h1>


        <form method="POST" action="{{ route('login.store') }}">
            @csrf

            <div>
                <label for="usuario">Usuario</label>
                <input id="usuario" type="text" name="usuario" value="{{ old('usuario') }}" required autofocus>
            </div>

            <div>
                <label for="password">Contraseña</label>
                <input id="password" type="password" name="password" required>
            </div>

            <div>
                <button type="submit">Iniciar sesión</button>
            </div>
        </form>


