<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UsuarioArchivo;
use App\Traits\FileTrait;
use Illuminate\Http\Request;
use Redirect;

class UsuarioArchivoController extends Controller
{
    use FileTrait;

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
            'user_id' => 'required|exists:App\Models\User,id'
        ]);

        $usuario = User::findOrFail($request->user_id);

        if ($request->hasFile('identificacion_representante_legal')) {
            $nameFile = $this->saveFile($request->file('identificacion_representante_legal'));
            UsuarioArchivo::create([
                'user_id' => $usuario->id,
                'nombre' => $nameFile,
                'tipo_archivo_id' => 1
            ]);
        }

        if ($request->hasFile('comprobante_docimicilio_representante')) {
            $nameFile = $this->saveFile($request->file('comprobante_docimicilio_representante'));

            UsuarioArchivo::create([
                'user_id' => $usuario->id,
                'nombre' => $nameFile,
                'tipo_archivo_id' => 2
            ]);
        }

        if ($request->hasFile('comprobante_docimicilio_empresa')) {
            $nameFile = $this->saveFile($request->file('comprobante_docimicilio_empresa'));

            UsuarioArchivo::create([
                'user_id' => $usuario->id,
                'nombre' => $nameFile,
                'tipo_archivo_id' => 3
            ]);
        }

        if ($request->hasFile('curriculum_empresa')) {
            $nameFile = $this->saveFile($request->file('curriculum_empresa'));

            UsuarioArchivo::create([
                'user_id' => $usuario->id,
                'nombre' => $nameFile,
                'tipo_archivo_id' => 4
            ]);
        }

        if ($request->hasFile('formato_buro_legal')) {
            $nameFile = $this->saveFile($request->file('formato_buro_legal'));

            UsuarioArchivo::create([
                'user_id' => $usuario->id,
                'nombre' => $nameFile,
                'tipo_archivo_id' => 5
            ]);
        }

        if ($request->hasFile('formato_buro_empresa')) {
            $nameFile = $this->saveFile($request->file('formato_buro_empresa'));

            UsuarioArchivo::create([
                'user_id' => $usuario->id,
                'nombre' => $nameFile,
                'tipo_archivo_id' => 6
            ]);
        }

        if ($request->hasFile('declaracion_isr')) {
            $nameFile = $this->saveFile($request->file('declaracion_isr'));

            UsuarioArchivo::create([
                'user_id' => $usuario->id,
                'nombre' => $nameFile,
                'tipo_archivo_id' => 7
            ]);
        }

        if ($request->hasFile('acuse_isr_reciente')) {
            $nameFile = $this->saveFile($request->file('acuse_isr_reciente'));

            UsuarioArchivo::create([
                'user_id' => $usuario->id,
                'nombre' => $nameFile,
                'tipo_archivo_id' => 8
            ]);
        }

        if ($request->hasFile('declaracion_isr_last_year')) {
            $nameFile = $this->saveFile($request->file('declaracion_isr_last_year'));

            UsuarioArchivo::create([
                'user_id' => $usuario->id,
                'nombre' => $nameFile,
                'tipo_archivo_id' => 9
            ]);
        }

        if ($request->hasFile('acuse_recibo_isr_last_year')) {
            $nameFile = $this->saveFile($request->file('acuse_recibo_isr_last_year'));

            UsuarioArchivo::create([
                'user_id' => $usuario->id,
                'nombre' => $nameFile,
                'tipo_archivo_id' => 10
            ]);
        }

        if ($request->hasFile('declaracion_isr_penultimo_year')) {
            $nameFile = $this->saveFile($request->file('declaracion_isr_penultimo_year'));

            UsuarioArchivo::create([
                'user_id' => $usuario->id,
                'nombre' => $nameFile,
                'tipo_archivo_id' => 11
            ]);
        }

        if ($request->hasFile('acuse_isr_penultimo_year')) {
            $nameFile = $this->saveFile($request->file('acuse_isr_penultimo_year'));

            UsuarioArchivo::create([
                'user_id' => $usuario->id,
                'nombre' => $nameFile,
                'tipo_archivo_id' => 12
            ]);
        }

        if ($request->hasFile('acuse_isr_penultimo_year')) {
            $nameFile = $this->saveFile($request->file('acuse_isr_penultimo_year'));

            UsuarioArchivo::create([
                'user_id' => $usuario->id,
                'nombre' => $nameFile,
                'tipo_archivo_id' => 13
            ]);
        }

        if ($request->hasFile('estados_financieros_last_year')) {
            $nameFile = $this->saveFile($request->file('estados_financieros_last_year'));

            UsuarioArchivo::create([
                'user_id' => $usuario->id,
                'nombre' => $nameFile,
                'tipo_archivo_id' => 14
            ]);
        }

        if ($request->hasFile('estados_financieros_penultimo_year')) {
            $nameFile = $this->saveFile($request->file('estados_financieros_penultimo_year'));

            UsuarioArchivo::create([
                'user_id' => $usuario->id,
                'nombre' => $nameFile,
                'tipo_archivo_id' => 15
            ]);
        }

        if ($request->hasFile('estados_bancarios_3_meses')) {
            $nameFile = $this->saveFile($request->file('estados_bancarios_3_meses'));

            UsuarioArchivo::create([
                'user_id' => $usuario->id,
                'nombre' => $nameFile,
                'tipo_archivo_id' => 16
            ]);
        }

        if ($request->hasFile('constancia_fiscal')) {
            $nameFile = $this->saveFile($request->file('constancia_fiscal'));

            UsuarioArchivo::create([
                'user_id' => $usuario->id,
                'nombre' => $nameFile,
                'tipo_archivo_id' => 17
            ]);
        }

        if ($request->hasFile('acta_constitutiva')) {
            $nameFile = $this->saveFile($request->file('acta_constitutiva'));

            UsuarioArchivo::create([
                'user_id' => $usuario->id,
                'nombre' => $nameFile,
                'tipo_archivo_id' => 18
            ]);
        }

        if ($request->hasFile('opinion_cumplimiento')) {
            $nameFile = $this->saveFile($request->file('opinion_cumplimiento'));

            UsuarioArchivo::create([
                'user_id' => $usuario->id,
                'nombre' => $nameFile,
                'tipo_archivo_id' => 19
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
        $row = UsuarioArchivo::findOrFail($id);

        $row->delete();

        $this->deleteFile($row->nombre);

        return  Redirect::to("/clientes/{$row->user_id}?tab=expediente")->with('success', 'Se ha eliminado con éxito');
    }
}
