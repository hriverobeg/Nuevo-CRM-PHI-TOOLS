<?php

namespace App\Services;

use App\Models\Admin;
use App\Models\Cotizacion;
use App\Models\Notificacion;
use App\Models\User;

class NotificacionService {

    public static function creadoCotizacion(User $user, Cotizacion $cotizacion) {
        $titulo = "Usuario ha creado deal";
        $mensaje = "{$user->nombre} ha creado un deal llamado {$cotizacion->tituloCotizacion}";

        self::sendAdmins($titulo, $mensaje);
    }

    public static function moverCotizacion(User $user, Cotizacion $cotizacion) {
        $titulo = "Usuario ha movido un deal de una columna a otra";
        $mensaje = "{$user->nombre} ha movido {$cotizacion->tituloCotizacion} a {$cotizacion->board->nombre}";

        self::sendAdmins($titulo, $mensaje);
    }

    public static function eliminadoCotizacion(User $user, Cotizacion $cotizacion) {
        $titulo = "Usuario ha eliminado un deal";
        $mensaje = "{$user->nombre} ha eliminado el deal {$cotizacion->tituloCotizacion}";

        self::sendAdmins($titulo, $mensaje);
    }

    public static function completadoInformacionGeneral(User $user, User $userTo) {
        $titulo = "Usuario ha completado la información general de uno de sus clientes";
        $mensaje = "{$user->nombre} ha completado la información general de {$userTo->nombre}";

        self::sendAdmins($titulo, $mensaje);
    }

    public static function completadoExpedienteCredito(User $user, User $userTo) {
        $titulo = "Usuario ha completado el expediente de crédito de uno de sus clientes";
        $mensaje = "{$user->nombre} ha completado el expediente de crédito de {$userTo->nombre}";

        self::sendAdmins($titulo, $mensaje);
    }

    public static function usuarioPropuestaAceptada(User $user) {
        $titulo = "Propuesta aceptada";
        $mensaje = "{$user->nombre}, el equipo de ventas de PHI TOOLS se pondrá en contacto contigo para autorizar la operación";

        self::store($titulo, $mensaje, $user->id);
    }

    public static function usuarioPropuestaAutorizada(User $adminSend, User $adminAction, Cotizacion $cotizacion) {
        $titulo = "{$adminAction->nombre} ha movido deal de usuario a columna Propuesta autorizada ";
        $mensaje = "{$adminSend->nombre}, PHI TOOLS ha autorizado {$cotizacion->tituloCotizacion}, el equipo de ventas se pondrá en contacto contigo para ejecutar la operación";

        self::store($titulo, $mensaje, $adminSend->id);
    }

    public static function usuarioPropuestaEjecutada(User $adminSend, User $adminAction, Cotizacion $cotizacion) {
        $titulo = "{$adminAction->nombre} ha movido deal de usuario a columna Propuesta ejecutada";
        $mensaje = "{$adminSend->nombre}, PHI TOOLS ha ejecutado {$cotizacion->tituloCotizacion}, el equipo de ventas se pondrá en contacto contigo para darte tu comisión por apertura";

        self::store($titulo, $mensaje, $adminSend->id);
    }

    public static function usuarioPropuestaRechazada(User $adminSend, User $adminAction, Cotizacion $cotizacion) {
        $titulo = "{$adminAction->nombre} ha movido deal de usuario a columna Propuesta rechazada";
        $mensaje = "{$adminSend->nombre}, PHI TOOLS ha rechazado {$cotizacion->tituloCotizacion}, el equipo de ventas se pondrá en contacto contigo para darte retroalimentación";

        self::store($titulo, $mensaje, $adminSend->id);
    }

    private static function sendAdmins(string $titulo, string $mensaje) {
        $admins = Admin::all();
        foreach ($admins as $row) {
            self::store($titulo, $mensaje, $row->id);
        }
    }

    public static function store(string $titulo, string $mensaje, int $user_id): Notificacion {
        return Notificacion::create([
            'titulo' => $titulo,
            'mensaje' => $mensaje,
            'user_id' => $user_id
        ]);
    }
}
