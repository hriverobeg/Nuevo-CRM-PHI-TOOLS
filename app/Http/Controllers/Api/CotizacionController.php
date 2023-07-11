<?php

namespace App\Http\Controllers\Api;

use App\Exceptions\DirtyException;
use App\Http\Controllers\Controller;
use App\Models\Cotizacion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class CotizacionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Cotizacion $cotizacion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cotizacion $cotizacion)
    {
        if ($request->has('board_id')) {
            $cotizacion->board_id = $request->board_id;
        }

        if (!$cotizacion->isDirty()) {
            throw new DirtyException();
        }

        $cotizacion->save();

        return Response::json($cotizacion);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cotizacion $cotizacion)
    {
        //
    }
}
