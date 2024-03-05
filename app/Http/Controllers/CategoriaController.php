<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Categoria::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $inputs = $request->input();
        $c = Categoria::create($inputs);

        return response()->json([
            'data' => $c,
            'message' => "Categoria actualizado",
        ]);

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $c = Categoria::find($id);
        if (isset ($c)){
            return response()->json([
                'data' => $c,
                'message' => "Categoria encontrado",
            ]);
        }else{
            return response()->json([
                'error' => true,
                'message' => "No existe la Categoria",
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $c = Categoria::find($id);
        if (isset ($c)){
            $c->nombre = $request->nombre;
            if ($c->save()){
                return response()->json([
                    'data' => $c,
                    'message' => "Categoria actualizado",
                ]);
            }else{
                return response()->json([
                    'error' => true,
                    'message' => "No se actualizo",
                ]);
            }

        }else{
            return response()->json([
                'error' => true,
                'message' => "No existe el Categoria",
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $c = Categoria::find($id);
        if (isset ($c)){
            $Res=Categoria::destroy($id);
            if ($Res){
                return response()->json([
                    'data' => $c,
                    'message' => "Categoria eliminado",
                ]);
            }else{
                return response()->json([
                    'data' => $c,
                    'message' => "No existe el Categoria",
                ]);
            }
        }else{
            return response()->json([
                'error' => true,
                'message' => "No existe el Categoria",
            ]);
        }
    }
}
