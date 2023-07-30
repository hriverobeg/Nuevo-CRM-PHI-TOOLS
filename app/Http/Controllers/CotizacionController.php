<?php

namespace App\Http\Controllers;

use App\Http\Resources\BoardResource;
use App\Mail\CotizacionMail;
use App\Models\Admin;
use App\Models\Board;
use App\Models\Cotizacion;
use App\Models\Usuario;
use App\Traits\RedirectTrait;
use Auth;
use Illuminate\Http\Request;
use Mail;

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

        if ($auth->isAdmin) {
            $boards = Board::with('cotizaciones')->orderBy('id')->get();
        } else {
            $boards = Board::clientes($auth->id)->orderBy('id')->get();
        }

        $resource = BoardResource::collection($boards);

        return view('pages.cotizaciones.wrapper', [
            'boards' => $resource,
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
            ? []
            : Usuario::select('id', 'nombre')->where('admin_id', $auth->id)->get();

        $clientes = $auth->isAdmin
            ? Admin::cliente()->get()
            : [];

        $isAdmin = $auth->isAdmin;
        $interes = $auth->interes;
        $comisionPorcentaje = $auth->comisionPorcentaje;

        return view('pages.cotizaciones.form',
            compact(['usuarios', 'clientes', 'isAdmin', 'interes', 'comisionPorcentaje']));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $auth = Auth::user();

        if ($request->has('usuario_id') && $request->usuario_id != null) {
            Usuario::where([
                ['id', $request->usuario_id],
                ['admin_id', $auth->id]
            ])->firstOrFail();
        }

        Cotizacion::create([
            'usuario_id'                => $request->usuario_id ?? null,
            'cliente_id'                => $request->cliente_id ?? null,
            'admin_id'                  => $auth->id,
            'board_id'                  => 1,
            'nombreActivo'              => $request->nombreActivo,
            'anio'                      => $request->anio,
            'tituloCotizacion'          => $request->tituloCotizacion,
            'valorActivo'               => $request->valorActivo,
            'anticipo'                  => $request->anticipo,
            'anticipoPorcentaje'        => $request->anticipoPorcentaje,
            'comisionPorApertura'       => $request->comisionPorApertura ?? 0,
            'comisionPorcentaje'        => $request->comisionPorcentaje ?? $auth->comisionPorcentaje,
            'interes'                   => $request->interes ?? $auth->interes,
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

        $cotizacion = Cotizacion::with('cliente', 'usuario')->latest()->first();

        $email =  $cotizacion->usuario?->email ?? $cotizacion->cliente?->email;

        Mail::to($email)->send(new CotizacionMail($cotizacion));

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
