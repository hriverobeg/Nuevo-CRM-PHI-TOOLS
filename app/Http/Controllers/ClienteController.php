<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Cliente;
use App\Models\UsuarioArchivo;
use App\Traits\RedirectTrait;
use Auth;
use Illuminate\Http\Request;
use Redirect;

class ClienteController extends Controller
{
    use RedirectTrait;

    protected $page = 'clientes';

    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        $auth = Auth::user();

        if ($auth->isAdmin) {
            $list = Cliente::all();
        } else {
            $list = Cliente::where('parent_user_id', $auth->id)->get();
        }

        return view('pages.clientes.wrapper', compact('list'));
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
        $auth = Auth::user();

        Cliente::create([
            'nombre' => $request->nombre,
            'email' => $request->email,
            'telefono' => $request->telefono,
            'parent_user_id' => $auth->id,
            'nivel_id' => 3
        ]);

        return $this->redirectIndex($this->page);


    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $usuario = Cliente::findOrFail($id);

        $identificacionRepresentanteLegal = UsuarioArchivo::archivos($usuario->id, 1)->get();
        $comprobante_docimicilio_representante = UsuarioArchivo::archivos($usuario->id, 2)->get();
        $comprobante_docimicilio_empresa = UsuarioArchivo::archivos($usuario->id, 3)->get();
        $curriculum_empresa = UsuarioArchivo::archivos($usuario->id, 4)->get();
        $formato_buro_legal = UsuarioArchivo::archivos($usuario->id, 5)->get();
        $formato_buro_empresa = UsuarioArchivo::archivos($usuario->id, 6)->get();
        $declaracion_isr = UsuarioArchivo::archivos($usuario->id, 7)->get();
        $acuse_isr_reciente = UsuarioArchivo::archivos($usuario->id, 8)->get();
        $declaracion_isr_last_year = UsuarioArchivo::archivos($usuario->id, 9)->get();
        $acuse_recibo_isr_last_year = UsuarioArchivo::archivos($usuario->id, 10)->get();
        $declaracion_isr_penultimo_year = UsuarioArchivo::archivos($usuario->id, 11)->get();
        $acuse_isr_penultimo_year = UsuarioArchivo::archivos($usuario->id, 12)->get();
        $estados_financieros = UsuarioArchivo::archivos($usuario->id, 13)->get();
        $estados_financieros_last_year = UsuarioArchivo::archivos($usuario->id, 14)->get();
        $estados_financieros_penultimo_year = UsuarioArchivo::archivos($usuario->id, 15)->get();
        $estados_bancarios_3_meses = UsuarioArchivo::archivos($usuario->id, 16)->get();
        $constancia_fiscal = UsuarioArchivo::archivos($usuario->id, 17)->get();
        $acta_constitutiva = UsuarioArchivo::archivos($usuario->id, 18)->get();
        $opinion_cumplimiento = UsuarioArchivo::archivos($usuario->id, 18)->get();

        return view(
            'pages.clientes.detail',
            compact(
                'usuario',
                'identificacionRepresentanteLegal',
                'comprobante_docimicilio_representante',
                'comprobante_docimicilio_empresa',
                'curriculum_empresa',
                'formato_buro_legal',
                'formato_buro_empresa',
                'declaracion_isr',
                'acuse_isr_reciente',
                'declaracion_isr_last_year',
                'acuse_recibo_isr_last_year',
                'declaracion_isr_penultimo_year',
                'acuse_isr_penultimo_year',
                'estados_financieros',
                'estados_financieros_last_year',
                'estados_financieros_penultimo_year',
                'estados_bancarios_3_meses',
                'constancia_fiscal',
                'acta_constitutiva',
                'opinion_cumplimiento'
            )
        );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Admin $cliente)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $id)
    {
        $usuario = Cliente::findOrFail($id);

        if($request->has('nombre')){
            $usuario->nombre = $request->nombre;
        }

        if($request->has('email')){
            $usuario->email = $request->email;
        }

        if($request->has('telefono')){
            $usuario->telefono = $request->telefono;
        }

        if($request->has('empresa')){
            $usuario->empresa = $request->empresa;
        }

        if($request->has('direccion_empresa')){
            $usuario->direccion_empresa = $request->direccion_empresa;
        }

        if($request->has('giro_empresa')){
            $usuario->giro_empresa = $request->giro_empresa;
        }

        if($request->has('website_empresa')){
            $usuario->website_empresa = $request->website_empresa;
        }

        if (!$usuario->isDirty()) {
            // return $this->redirectDirty($usuario);
        }

        $usuario->save();

        return  Redirect::back()->with('success', 'Se ha actualizado con éxito');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cliente $cliente)
    {
        $cliente->delete();

        return $this->redirectIndex($this->page);
    }
}
