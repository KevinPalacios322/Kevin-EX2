<?php

namespace App\Http\Controllers;

use App\Models\Equipo;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class EquipoController extends Controller
{
    public function index(): View
    {
        return view('equipos.index', [
            'equipos' => Equipo::query()->orderBy('id')->get(),
        ]);
    }

    public function create(): View
    {
        return view('equipos.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $datos = $request->validate([
            'codigo' => ['required', 'string', 'max:30', 'unique:equipos,codigo'],
            'nombre' => ['required', 'string', 'max:100'],
            'marca' => ['required', 'string', 'max:80'],
            'fecha_adquisicion' => ['required', 'date'],
            'estado' => ['required', 'string', 'max:255'],
        ]);

        Equipo::create($datos);

        return redirect()->route('equipos.index')->with('mensaje', 'Equipo creado correctamente.');
    }

    public function edit(Equipo $equipo): View
    {
        return view('equipos.edit', compact('equipo'));
    }

    public function update(Request $request, Equipo $equipo): RedirectResponse
    {
        $datos = $request->validate([
            'codigo' => ['required', 'string', 'max:30', Rule::unique('equipos', 'codigo')->ignore($equipo->id)],
            'nombre' => ['required', 'string', 'max:100'],
            'marca' => ['required', 'string', 'max:80'],
            'fecha_adquisicion' => ['required', 'date'],
            'estado' => ['required', 'string', 'max:255'],
        ]);

        $equipo->update($datos);

        return redirect()->route('equipos.index')->with('mensaje', 'Equipo actualizado correctamente.');
    }
}
