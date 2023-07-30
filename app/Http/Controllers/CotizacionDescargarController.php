<?php

namespace App\Http\Controllers;

use App\Models\Cotizacion;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class CotizacionDescargarController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $this->validate($request, [
            'email' => 'required',
            'id' => 'required|exists:cotizacion,id'
        ]);

        $cotizacionCliente = Cotizacion::
            with('cliente')
            ->whereHas('cliente', function (Builder $builder) use ($request) {
                $builder->where('email', $request->email);
            })
            ->where('id', $request->id)
            ->first();

        $cotizacionUsuario = Cotizacion::
            with('usuario')
            ->whereHas('usuario', function (Builder $builder) use ($request) {
                $builder->where('email', $request->email);
            })
            ->where('id', $request->id)
            ->first();

        if (empty($cotizacionCliente) && empty($cotizacionUsuario)) {
            abort(404);
        }

        return view('pages.cotizacion', [
            'cotizacion' => $cotizacionCliente ?? $cotizacionUsuario
        ]);
    }
}
