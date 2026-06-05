<?php

namespace App\Http\Controllers;

use App\Models\Cargo;
use Illuminate\Http\Request;

class CargoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(Cargo::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $cargo = Cargo::create($request->all());
        return response()->json($cargo, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $cargo = Cargo::find($id);
        if (!$cargo) {
            return response()->json(['message' => 'Cargo no encontrado'], 404);
        }
        return response()->json($cargo); //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $cargo = Cargo::find($id);
        if (!$cargo) {
            return response()->json(['message' => 'Cargo no encontrado'], 404);
        }
        $cargo->update($request->all());
        return response()->json($cargo);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $cargo = Cargo::find($id);
        if (!$cargo) {
            return response()->json(['message' => 'Cargo no encontrado'], 404);
        }
        $cargo->delete();
        return response()->json(['message' => 'Cargo eliminado']);
    }
}
