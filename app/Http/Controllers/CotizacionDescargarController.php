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

        $cotizacion = Cotizacion::
            with('to_user', 'to_user')
            ->whereHas('to_user', function (Builder $builder) use ($request) {
                $builder->where('email', $request->email);
            })
            ->where('id', $request->id)
            ->firstOrFail();


        return view('pages.cotizacion', [
            'cotizacion' => $cotizacion
        ]);
    }
}
