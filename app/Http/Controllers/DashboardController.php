<?php

namespace App\Http\Controllers;

use App\Enums\BoardEnum;
use App\Models\Admin;
use App\Models\Board;
use App\Models\Cotizacion;
use App\Models\Usuario;
use App\Traits\AuthTrait;
use Auth;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    use AuthTrait;

    public function admin() {
        $this->redirectAdminPage();

        $usuariosCount = Usuario::count();
        $clientesCount = Admin::cliente()->count();

        $enviadas = Cotizacion::where('board_id', BoardEnum::ENVIADAS)->count();
        $aceptadas = Cotizacion::where('board_id', BoardEnum::ACEPTADAS)->count();
        $autorizadas = Cotizacion::where('board_id', BoardEnum::AUTORIZADAS)->count();
        $ejecutadas = Cotizacion::where('board_id', BoardEnum::EJECUTADAS)->count();
        $rechazadas = Cotizacion::where('board_id', BoardEnum::RECHAZADAS)->count();

        return view(
            'pages.dashboard.admin',
            compact(
                'usuariosCount',
                'clientesCount',
                'enviadas',
                'aceptadas',
                'autorizadas',
                'ejecutadas',
                'rechazadas'
            ));
    }

    public function cliente() {
        $this->redirectClientPage();

        $auth = Auth::user();

        $usuariosCount = Usuario::where('admin_id', $auth->id)->count();
        $enviadas = Cotizacion::clienteBoard($auth->id, BoardEnum::ENVIADAS)->count();
        $aceptadas = Cotizacion::clienteBoard($auth->id, BoardEnum::ACEPTADAS)->count();
        $autorizadas = Cotizacion::clienteBoard($auth->id, BoardEnum::AUTORIZADAS)->count();
        $ejecutadas = Cotizacion::clienteBoard($auth->id, BoardEnum::EJECUTADAS)->count();
        $rechazadas = Cotizacion::clienteBoard($auth->id, BoardEnum::RECHAZADAS)->count();

        return view('pages.dashboard.cliente',
            compact(
                'usuariosCount',
                'enviadas',
                'aceptadas',
                'autorizadas',
                'ejecutadas',
                'rechazadas'
            )
        );
    }
}
