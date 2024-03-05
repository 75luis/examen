<?php

namespace App\Http\Controllers;

use App\Models\Libro;
use Illuminate\Http\Request;

class LibroController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Libro::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $inputs = $request->input();
        $l = Libro::create($inputs);

        return response()->json([
            'data' => $l,
            'message' => "Libro actualizado",
        ]);

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $l = Libro::find($id);
        if (isset ($l)){
            return response()->json([
                'data' => $l,
                'message' => "Libro encontrado",
            ]);
        }else{
            return response()->json([
                'error' => true,
                'message' => "No existe el Libro",
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $l = Libro::find($id);
        if (isset ($l)){
            $l->nombre = $request->nombre;
            $l->autor_id = $request->autor_id;
            if ($l->save()){
                return response()->json([
                    'data' => $l,
                    'message' => "Estudiante actualizado",
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
                'message' => "No existe el estudiante",
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $l = Libro::find($id);
        if (isset ($l)){
            $Res=Libro::destroy($id);
            if ($Res){
                return response()->json([
                    'data' => $l,
                    'message' => "Libro eliminado",
                ]);
            }else{
                return response()->json([
                    'data' => $l,
                    'message' => "No existe el Libro",
                ]);
            }
        }else{
            return response()->json([
                'error' => true,
                'message' => "No existe el estudiante",
            ]);
        }
    }
}
