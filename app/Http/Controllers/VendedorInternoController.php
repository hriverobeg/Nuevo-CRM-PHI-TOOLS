<?php

namespace App\Http\Controllers;

use App\Models\VendedorInterno;
use App\Traits\RedirectTrait;
use Hash;
use Illuminate\Http\Request;

class VendedorInternoController extends Controller
{
    use RedirectTrait;

    protected $page = 'vendedor-interno';
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $list = VendedorInterno::all();

        return view('pages.internos.wrapper', compact('list'));
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

        VendedorInterno::create([
            'nombre' => $request->nombre,
            'password' => Hash::make($request->password),
            'email' => $request->email,
            'telefono' => $request->telefono,
            'empresa' => $request->empresa,
            'nivel_id' => 4
        ]);

        return $this->redirectIndex($this->page);
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
        $cliente = VendedorInterno::findOrFail($id);

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
            return $this->redirectDirty($cliente, 'vendedor-interno');
        }

        $cliente->save();

        return $this->redirectIndex($this->page);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $row = VendedorInterno::findOrFail($id);
        $row->delete();

        return $this->redirectIndex($this->page);
    }
}
