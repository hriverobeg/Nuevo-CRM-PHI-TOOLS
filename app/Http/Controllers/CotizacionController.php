<?php

namespace App\Http\Controllers;

use App\Http\Resources\BoardResource;
use App\Http\Resources\CotizacionResource;
use App\Mail\CotizacionMail;
use App\Models\Admin;
use App\Models\Board;
use App\Models\Cliente;
use App\Models\Cotizacion;
use App\Models\User;
use App\Models\Usuario;
use App\Services\NotificacionService;
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
    // public function index()
    // {
    //     $auth = Auth::user();

    //     if ($auth->isAdmin) {
    //         $boards = Board::with('cotizaciones')->orderBy('id')->get();
    //     } else {
    //         $boards = Board::clientes($auth->id)->orderBy('id')->get();
    //     }

    //     $resource = BoardResource::collection($boards);

    //     return view('pages.cotizaciones.wrapper', [
    //         'boards' => $resource,
    //         'isAdmin' => $auth->isAdmin
    //     ]);
    // }
    public function index()
    {
        $auth = Auth::user();

        if ($auth->isAdmin) {
            $list = Cotizacion::orderBy('id')->get();
        } else {
            $list = Cotizacion::where('from_user_id', $auth->id)->orderBy('id')->get();
        }

        $resource = CotizacionResource::collection($list);

        return view('pages.cotizaciones.list', [
            'list' => $resource,
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
            ? User::select('id', 'nombre', 'email')->get()
            : User::select('id', 'nombre', 'email')->where('parent_user_id', $auth->id)->get();

        $clientes = $auth->isAdmin
            ? Cliente::all()
            : User::select('id', 'nombre', 'email')->where('parent_user_id', $auth->id)->get();

        $isAdmin = $auth->isAdmin;
        $interes = $auth->interes;
        $comisionPorcentaje = $auth->comisionPorcentaje;
        $nivelId = $auth->nivel_id;


        return view('pages.cotizaciones.form',
            compact(['usuarios', 'clientes', 'isAdmin', 'interes', 'comisionPorcentaje', 'nivelId']));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $auth = Auth::user();

        if ($request->has('usuario_id') && $request->usuario_id != null) {
            Usuario::findOrFail($request->usuario_id);
        }

        if ($request->has('array')) {

            $grupo = Cotizacion::orderByDesc('grupo')->first()->grupo ?? 0;

            foreach($request->array as $coti) {
                $cotizacion = $this->createCotizacion((object)$coti, $auth, $grupo + 1);
            }

            NotificacionService::creadoCotizacion($auth, $cotizacion);
            try {
                $email =  $cotizacion->to_user?->email;
                Mail::to($email)->send(new CotizacionMail($cotizacion));
            } catch (\Throwable $th) {
                logger($th);
            }

        } else {

            $cotizacion = $this->createCotizacion($request, $auth);
            NotificacionService::creadoCotizacion($auth, $cotizacion);

            try {
                $email =  $cotizacion->to_user?->email;
                Mail::to($email)->send(new CotizacionMail($cotizacion));
            } catch (\Throwable $th) {
                logger($th);
            }
        }

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
    public function destroy(int $id)
    {
        $auth = Auth::user();
        $cotizacion = Cotizacion::findOrFail($id);
        $cotizacion->delete();

        NotificacionService::eliminadoCotizacion($auth, $cotizacion);

        return $this->redirectIndex($this->page);
    }

    private function createCotizacion($item, $auth, $grupo = null) {
        Cotizacion::create([
            'to_user_id'                   => $item->usuario_id ?? $item->cliente_id ?? null,
            'from_user_id'                  => $auth->id,
            'board_id'                  => 1,
            'nombreActivo'              => $item->nombreActivo,
            'anio'                      => $item->anio ?? 2024,
            'tituloCotizacion'          => $item->tituloCotizacion,
            'valorActivo'               => $item->valorActivo,
            'anticipo'                  => $item->anticipo ?? 0,
            'anticipoPorcentaje'        => $item->anticipoPorcentaje ?? 0,
            'comisionPorApertura'       => $item->comisionPorApertura ?? 0,
            'comisionPorcentaje'        => $item->comisionPorcentaje ?? $auth->comisionPorcentaje,
            'interes'                   => $item->interes ?? $auth->interes,
            'valorSeguro'               => $item->valorSeguro ?? 0,
            'tipoActivo'                => $item->tipoActivo,
            'otro'                      => $item->otro,
            'valorResidual24'           => $item->valorResidual24,
            'valorResidual36'           => $item->valorResidual36,
            'valorResidual48'           => $item->valorResidual48,
            'valorResidual60'           => $item->valorResidual60,
            'valorResidual24Cantidad'   => $item->valorResidual24Cantidad,
            'valorResidual36Cantidad'   => $item->valorResidual36Cantidad,
            'valorResidual48Cantidad'   => $item->valorResidual48Cantidad,
            'valorResidual60Cantidad'   => $item->valorResidual60Cantidad,
            'isTelematics'              => $this->stringPuri($item->isTelematics) ?? false,
            'isSeguro'                  => $this->stringPuri($item->isSeguro) ?? false,
            'is24'                      => $this->stringPuri($item->is24) ?? false,
            'is36'                      => $this->stringPuri($item->is36) ?? false,
            'is48'                      => $this->stringPuri($item->is48) ?? false,
            'is60'                      => $this->stringPuri($item->is60) ?? false,
            'isAlivioFiscal'            => $this->stringPuri($item->isAlivioFiscal) ?? false,
            'grupo'                     => $grupo ?? null,
        ]);

        $cotizacion = Cotizacion::with('from_user', 'to_user')->latest()->first();

        return $cotizacion;
    }

    private function stringPuri ($val) {
        if($val == "true" || $val == "false") {
            return $val == "true" ? true : false;
        }

        return $val;
    }
}
