<?php

namespace App\Http\Controllers;

use App\Models\FuncionesCargo;
use Illuminate\Http\Request;

class FuncionesCargoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(FuncionesCargo::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $funcion = FuncionesCargo::create($request->all());
        return response()->json($funcion, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $funcion = FuncionesCargo::find($id);
        if (!$funcion) {
            return response()->json(['message' => 'Función no encontrada'], 404);
        }
        return response()->json($funcion);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $funcion = FuncionesCargo::find($id);
        if (!$funcion) {
            return response()->json(['message' => 'Función no encontrada'], 404);
        }
        $funcion->update($request->all());
        return response()->json($funcion);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $funcion = FuncionesCargo::find($id);
        if (!$funcion) {
            return response()->json(['message' => 'Función no encontrada'], 404);
        }
        $funcion->delete();
        return response()->json(['message' => 'Función eliminada']);
    }
}
