<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Usuario;
use App\Traits\RedirectTrait;
use Hash;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    use RedirectTrait;

    protected $page = 'vendedor-externo';
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $list = Usuario::all();

        return view('pages.usuarios.wrapper', compact('list'));
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
        $this->validate(
            $request,
            [
                'email' => 'required|unique:admin,email',
                'nombre' => 'required',
                'password' => 'required',
                'telefono' => 'required',
                'empresa' => 'required',
                'interes' => 'required',
                'comisionPorcentaje' => 'required'
            ]
        );

        Usuario::create([
            'nombre' => $request->nombre,
            'password' => Hash::make($request->password),
            'email' => $request->email,
            'telefono' => $request->telefono,
            'empresa' => $request->empresa,
            'nivel_id' => 2,
            'interes' => $request->interes,
            'comisionPorcentaje' => $request->comisionPorcentaje
        ]);

        return $this->redirectIndex($this->page);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Usuario $usuario)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $id)
    {
        $cliente = Usuario::findOrFail($id);

        if($request->has('nombre')){
            $cliente->nombre = $request->nombre;
        }

        if($request->has('telefono')){
            $cliente->telefono = $request->telefono;
        }

        if($request->has('empresa')){
            $cliente->empresa = $request->empresa;
        }

        if($request->has('interes')){
            $cliente->interes = $request->interes;
        }

        if($request->has('comisionPorcentaje')){
            $cliente->comisionPorcentaje = $request->comisionPorcentaje;
        }

        if($request->has('password') && !empty($request->password)){
            $cliente->password = Hash::make($request->password);
        }

        if (!$cliente->isDirty()) {
            return $this->redirectDirty($cliente, 'clientes');
        }

        $cliente->save();

        return $this->redirectIndex($this->page);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $usuario = Usuario::findOrFail($id);
        $usuario->delete();

        return $this->redirectIndex($this->page);
    }
}
