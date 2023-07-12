<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use App\Traits\RedirectTrait;
use Auth;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    use RedirectTrait;

    protected $page = 'usuarios
    ';
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $auth = Auth::user();

        if ($auth->isAdmin) {
            $list = Usuario::all();
        } else {
            $list = Usuario::where('admin_id', $auth->id)->get();
        }

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
        $auth = Auth::user();

        Usuario::create([
            'nombre' => $request->nombre,
            'email' => $request->email,
            'telefono' => $request->telefono,
            'admin_id' => $auth->id
        ]);

        return $this->redirectIndex($this->page);
    }

    /**
     * Display the specified resource.
     */
    public function show(Usuario $usuario)
    {
        //
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
    public function update(Request $request, Usuario $usuario)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Usuario $usuario)
    {
        //
    }
}
