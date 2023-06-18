<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Traits\RedirectTrait;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    use RedirectTrait;

    protected $page = 'clientes';

    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        $list = Cliente::all();

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
        Cliente::create([
            'nombre' => $request->nombre,
            'email' => $request->email,
            'telefono' => $request->telefono,
            'empresa' => $request->empresa
        ]);

        return $this->redirectIndex($this->page);
    }

    /**
     * Display the specified resource.
     */
    public function show(Cliente $cliente)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cliente $cliente)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cliente $cliente)
    {
        if($request->has('nombre')){
            $cliente->nombre = $request->nombre;
        }

        if($request->has('email')){
            $cliente->email = $request->email;
        }

        if($request->has('telefono')){
            $cliente->telefono = $request->telefono;
        }

        if($request->has('empresa')){
            $cliente->empresa = $request->empresa;
        }

        if (!$cliente->isDirty()) {
            // return $this->redirectDirty($cliente);
        }

        $cliente->save();

        return $this->redirectIndex($this->page);
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
