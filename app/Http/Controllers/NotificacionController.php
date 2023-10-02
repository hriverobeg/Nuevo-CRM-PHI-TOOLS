<?php

namespace App\Http\Controllers;

use App\Models\Notificacion;
use Auth;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Response;

class NotificacionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $auth = Auth::user();

        $notificaciones = Notificacion::where('admin_id', $auth->id)
            ->orderByDesc('id')
            ->limit(30);

        $notificaciones->update(['leido_at' => Carbon::now()]);

        $list = $notificaciones->get();

        return view('pages.notificaciones.wrapper', compact('list'));
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $auth = Auth::user();

        $row = Notificacion::where([['id', $id], ['admin_id', $auth->id]])->firstOrFail();

        $row->delete();

        return redirect('/notificaciones');

    }
}
