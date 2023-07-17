<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Cliente;
use App\Traits\RedirectTrait;
use Hash;
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
        $list = Admin::cliente()->get();

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
        $this->validate(
            $request,
            [
                'email' => 'required|unique:admin,email',
                'nombre' => 'required',
                'password' => 'required',
                'telefono' => 'required',
                'empresa' => 'required'
            ]
        );

        Admin::create([
            'nombre' => $request->nombre,
            'password' => Hash::make($request->password),
            'email' => $request->email,
            'telefono' => $request->telefono,
            'empresa' => $request->empresa,
            'nivel_id' => 2
        ]);

        return $this->redirectIndex($this->page);
    }

    /**
     * Display the specified resource.
     */
    public function show(Admin $cliente)
    {
        //
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
    public function update(Request $request, Admin $cliente)
    {
        if($request->has('nombre')){
            $cliente->nombre = $request->nombre;
        }

        if($request->has('telefono')){
            $cliente->telefono = $request->telefono;
        }

        if($request->has('empresa')){
            $cliente->empresa = $request->empresa;
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
    public function destroy(Admin $cliente)
    {
        $cliente->delete();

        return $this->redirectIndex($this->page);
    }
}
