<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Board;
use App\Models\Cotizacion;
use App\Models\Usuario;
use App\Traits\RedirectTrait;
use Auth;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class CotizacionController extends Controller
{
    use RedirectTrait;
    protected $page = 'cotizaciones';

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $auth = Auth::user();

        $boards = Board::
            with('cotizaciones')
            ->when(!$auth->isAdmin, function (Builder $builder) use ($auth) {
                $builder->where('cliente_id', $auth->id);
            })
            ->get();
        return view('pages.cotizaciones.wrapper', [
            'boards' => $boards,
            'isAdmin' => $auth->isAdmin
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $auth = Auth::user();

        $usuarios = $auth->isAdmin 
            ? Usuario::all('id', 'nombre') 
            : Usuario::select('id', 'nombre')->where('admin_id', $auth->id)->get(); 

        $clientes = $auth->isAdmin 
            ? Admin::cliente()->get()
            : [];

        return view('pages.cotizaciones.form', compact(['usuarios', 'clientes']));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $auth = Auth::user();

        Usuario::where([
            ['usuario_id', $request->usuario_id],
            ['admin_id', $auth->id]
        ])->firstOrFail();

        Cotizacion::create([
            'usuario_id'                => $request->usuario_id,
            'admin_id'                  => $request->admin_id ?? $auth->id,
            'board_id'                  => 1,
            'nombreActivo'              => $request->nombreActivo,
            'anio'                      => $request->anio,
            'tituloCotizacion'          => $request->tituloCotizacion,
            'valorActivo'               => $request->valorActivo,
            'anticipo'                  => $request->anticipo,
            'anticipoPorcentaje'        => $request->anticipoPorcentaje,
            'comisionPorApertura'       => $request->comisionPorApertura,
            'comisionPorcentaje'        => $request->comisionPorcentaje,
            'interes'                   => $request->interes,
            'valorSeguro'               => $request->valorSeguro,
            'tipoActivo'                => $request->tipoActivo,
            'otro'                      => $request->otro,
            'valorResidual24'           => $request->valorResidual24,
            'valorResidual36'           => $request->valorResidual36,
            'valorResidual48'           => $request->valorResidual48,
            'valorResidual60'           => $request->valorResidual60,
            'valorResidual24Cantidad'   => $request->valorResidual24Cantidad,
            'valorResidual36Cantidad'   => $request->valorResidual36Cantidad,
            'valorResidual48Cantidad'   => $request->valorResidual48Cantidad,
            'valorResidual60Cantidad'   => $request->valorResidual60Cantidad,
            'isTelematics'              => $request->isTelematics ?? false,
            'isSeguro'                  => $request->isSeguro ?? false,
            'is24'                      => $request->is24 ?? false,
            'is36'                      => $request->is36 ?? false,
            'is48'                      => $request->is48 ?? false,
            'is60'                      => $request->is60 ?? false,
            'isAlivioFiscal'            => $request->isAlivioFiscal ?? false,
        ]);

        return $this->redirectIndex($this->page);
    }

    /**
     * Display the specified resource.
     */
    public function show(Cotizacion $cotizacion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cotizacion $cotizacion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cotizacion $cotizacion)
    {
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cotizacion $cotizacion)
    {
        //
    }
}
