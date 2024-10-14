<?php

namespace App\Http\Controllers;

use App\Models\Cargo;
use Illuminate\Http\Request;

class CargoController extends Controller
{
    public function index()
    {
        $cargos = Cargo::where('estado', true)->get(); // Solo obtener cargos activos
        return view('Cargos.index', compact('cargos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'estado' => 'boolean',
        ]);

        Cargo::create($request->all());
        return redirect()->route('cargo.index')->with('success', 'Cargo creado con éxito.');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'estado' => 'boolean',
        ]);

        $cargo = Cargo::findOrFail($id);
        $cargo->update($request->all());
        return redirect()->route('cargo.index')->with('success', 'Cargo actualizado con éxito.');
    }


    public function destroy($id)
    {
        $cargo = Cargo::findOrFail($id);
        $cargo->estado = false; // Cambiar estado a false
        $cargo->save(); // Guardar los cambios

        return redirect()->route('cargo.index')->with('success', 'Cargo desactivado con éxito.');
    }

}
