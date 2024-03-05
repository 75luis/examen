<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Usuario::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $inputs = $request->input();
        $u = Usuario::create($inputs);

        return response()->json([
            'data' => $u,
            'message' => "Usuario actualizado",
        ]);

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $u = Usuario::find($id);
        if (isset ($u)){
            return response()->json([
                'data' => $u,
                'message' => "Usuario encontrado",
            ]);
        }else{
            return response()->json([
                'error' => true,
                'message' => "No existe el usuario",
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $u = Usuario::find($id);
        if (isset ($u)){
            $u->nombre = $request->nombre;
            if ($u->save()){
                return response()->json([
                    'data' => $u,
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
        $u = Usuario::find($id);
        if (isset ($u)){
            $Res=Usuario::destroy($id);
            if ($Res){
                return response()->json([
                    'data' => $u,
                    'message' => "Usuario eliminado",
                ]);
            }else{
                return response()->json([
                    'data' => $u,
                    'message' => "No existe el usuario",
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
