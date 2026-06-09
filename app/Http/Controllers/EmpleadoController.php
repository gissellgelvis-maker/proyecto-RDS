<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use Illuminate\Http\Request;

class EmpleadoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(Empleado::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombres' => 'required|string|max:100',
            'apellidos' => 'required|string|max:100',
            'fecha_nacimiento' => 'required|date',
            'fecha_ingreso' => 'required|date',
            'salario' => 'required|numeric|min:0',
            'estado' => 'required|in:activo,inactivo',
            'id_cargo' => 'required|integer'
        ]);
        $empleado = Empleado::create($request->all());
        return response()->json($empleado, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $empleado = Empleado::find($id);
        if (!$empleado) {
            return response()->json(['message' => 'Empleado no encontrado'], 404);
        }
        return response()->json($empleado);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nombres' => 'sometimes|string|max:100',
            'apellidos' => 'sometimes|string|max:100',
            'fecha_nacimiento' => 'sometimes|date',
            'fecha_ingreso' => 'sometimes|date',
            'salario' => 'sometimes|numeric|min:0',
            'estado' => 'sometimes|in:activo,inactivo',
            'id_cargo' => 'sometimes|integer'
        ]);

        $empleado = Empleado::find($id);
        if (!$empleado) {
            return response()->json(['message' => 'Empleado no encontrado'], 404);
        }
        $empleado->update($request->all());
        return response()->json($empleado);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $empleado = Empleado::find($id);
        if (!$empleado) {
            return response()->json(['message' => 'Empleado no encontrado'], 404);
        }
        $empleado->delete();
        return response()->json(['message' => 'Empleado eliminado']);
    }
}
