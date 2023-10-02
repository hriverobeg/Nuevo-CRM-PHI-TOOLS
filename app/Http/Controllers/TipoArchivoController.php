<?php

namespace App\Http\Controllers;

use App\Models\TipoArchivo;
use App\Models\Usuario;
use App\Models\UsuarioArchivo;
use App\Traits\FileTrait;
use Illuminate\Http\Request;
use Redirect;

class TipoArchivoController extends Controller
{
    use FileTrait;
    protected $folder = 'documents';

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'usuario_id' => 'required|exists:App\Models\Usuario,id'
        ]);

        $usuario = Usuario::findOrFail($request->usuario_id);

        if ($request->hasFile('identificacion_representante_legal')) {
            $nameFile = $this->saveFile($request->file('identificacion_representante_legal'), $this->folder);

            UsuarioArchivo::create([
                'usuario_id' => $usuario->id,
                'nombre' => $nameFile,
                'tipo_archivo_id' => 1
            ]);
        }

        return  Redirect::to("/clientes/{$usuario->id}?tab=expediente")->with('success', 'Se ha actualizado con éxito');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        $tipoArchivo = TipoArchivo::findOrFail($id);
        dd($tipoArchivo);
        $tipoArchivo->delete();

        return  Redirect::to("/clientes/{$tipoArchivo->usuario_id}?tab=expediente")->with('success', 'Se ha eliminado con éxito');
    }
}
