<?php

namespace App\Http\Controllers;

use App\Models\Autor;
use Illuminate\Http\Request;

class AutorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Autor::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $inputs = $request->input();
        $a = Autor::create($inputs);

        return response()->json([
            'data' => $a,
            'message' => "Autor actualizado",
        ]);

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $a = Autor::find($id);
        if (isset ($a)){
            return response()->json([
                'data' => $a,
                'message' => "Autor encontrado",
            ]);
        }else{
            return response()->json([
                'error' => true,
                'message' => "No existe el Autor",
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $a = Autor::find($id);
        if (isset ($a)){
            $a->nombre = $request->nombre;
            if ($a->save()){
                return response()->json([
                    'data' => $a,
                    'message' => "Autor actualizado",
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
                'message' => "No existe el autor",
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $a = Autor::find($id);
        if (isset ($a)){
            $Res=Autor::destroy($id);
            if ($Res){
                return response()->json([
                    'data' => $a,
                    'message' => "Autor eliminado",
                ]);
            }else{
                return response()->json([
                    'data' => $a,
                    'message' => "No existe el Autor",
                ]);
            }
        }else{
            return response()->json([
                'error' => true,
                'message' => "No existe el autor",
            ]);
        }
    }
}
