<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CampoGolfController extends Controller
{
    // Mostrar una lista de los campos de golf
    public function index()
    {
        $campos = CampoGolf::all();
        return view('campo-golfs.index', compact('campos'));
    }

    // Mostrar el formulario para crear un nuevo campo de golf
    public function create()
    {
        return view('campo-golfs.create');
    }

    // Almacenar un nuevo campo de golf
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'ubicacion' => 'required|string|max:255',
            'numero_hoyos' => 'required|integer',
        ]);

        CampoGolf::create($validated);

        return redirect()->route('campo-golfs.index')->with('success', 'Campo de golf creado exitosamente');
    }

    // Mostrar un campo de golf específico
    public function show(CampoGolf $campoGolf)
    {
        return view('campo-golfs.show', compact('campoGolf'));
    }

    // Mostrar el formulario para editar un campo de golf
    public function edit(CampoGolf $campoGolf)
    {
        return view('campo-golfs.edit', compact('campoGolf'));
    }

    // Actualizar un campo de golf
    public function update(Request $request, CampoGolf $campoGolf)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'ubicacion' => 'required|string|max:255',
            'numero_hoyos' => 'required|integer',
        ]);

        $campoGolf->update($validated);

        return redirect()->route('campo-golfs.index')->with('success', 'Campo de golf actualizado exitosamente');
    }

    // Eliminar un campo de golf
    public function destroy(CampoGolf $campoGolf)
    {
        $campoGolf->delete();

        return redirect()->route('campo-golfs.index')->with('success', 'Campo de golf eliminado exitosamente');
    }
}

