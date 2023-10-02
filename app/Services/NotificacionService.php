<?php

namespace App\Services;

use App\Models\Admin;
use App\Models\Cotizacion;
use App\Models\Notificacion;
use App\Models\Usuario;

class NotificacionService {

    public static function creadoCotizacion(Admin $admin, Cotizacion $cotizacion) {
        $titulo = "Usuario ha creado deal";
        $mensaje = "{$admin->nombre} ha creado un deal llamado {$cotizacion->tituloCotizacion}";

        self::sendAdmins($titulo, $mensaje);
    }

    public static function moverCotizacion(Admin $admin, Cotizacion $cotizacion) {
        $titulo = "Usuario ha movido un deal de una columna a otra";
        $mensaje = "{$admin->nombre} ha movido {$cotizacion->tituloCotizacion} a {$cotizacion->board->nombre}";

        self::sendAdmins($titulo, $mensaje);
    }

    public static function eliminadoCotizacion(Admin $admin, Cotizacion $cotizacion) {
        $titulo = "Usuario ha eliminado un deal";
        $mensaje = "{$admin->nombre} ha eliminado el deal {$cotizacion->tituloCotizacion}";

        self::sendAdmins($titulo, $mensaje);
    }

    public static function completadoInformacionGeneral(Admin $admin, Usuario $usuario) {
        $titulo = "Usuario ha completado la información general de uno de sus clientes";
        $mensaje = "{$admin->nombre} ha completado la información general de {$usuario->nombre}";

        self::sendAdmins($titulo, $mensaje);
    }

    public static function completadoExpedienteCredito(Admin $admin, Usuario $usuario) {
        $titulo = "Usuario ha completado el expediente de crédito de uno de sus clientes";
        $mensaje = "{$admin->nombre} ha completado el expediente de crédito de {$usuario->nombre}";

        self::sendAdmins($titulo, $mensaje);
    }

    public static function usuarioPropuestaAceptada(Admin $admin) {
        $titulo = "Propuesta aceptada";
        $mensaje = "{$admin->nombre}, el equipo de ventas de PHI TOOLS se pondrá en contacto contigo para autorizar la operación";

        self::store($titulo, $mensaje, $admin->id);
    }

    public static function usuarioPropuestaAutorizada(Admin $adminSend, Admin $adminAction, Cotizacion $cotizacion) {
        $titulo = "{$adminAction->nombre} ha movido deal de usuario a columna Propuesta autorizada ";
        $mensaje = "{$adminSend->nombre}, PHI TOOLS ha autorizado {$cotizacion->tituloCotizacion}, el equipo de ventas se pondrá en contacto contigo para ejecutar la operación";

        self::store($titulo, $mensaje, $adminSend->id);
    }

    public static function usuarioPropuestaEjecutada(Admin $adminSend, Admin $adminAction, Cotizacion $cotizacion) {
        $titulo = "{$adminAction->nombre} ha movido deal de usuario a columna Propuesta ejecutada";
        $mensaje = "{$adminSend->nombre}, PHI TOOLS ha ejecutado {$cotizacion->tituloCotizacion}, el equipo de ventas se pondrá en contacto contigo para darte tu comisión por apertura";

        self::store($titulo, $mensaje, $adminSend->id);
    }

    public static function usuarioPropuestaRechazada(Admin $adminSend, Admin $adminAction, Cotizacion $cotizacion) {
        $titulo = "{$adminAction->nombre} ha movido deal de usuario a columna Propuesta rechazada";
        $mensaje = "{$adminSend->nombre}, PHI TOOLS ha rechazado {$cotizacion->tituloCotizacion}, el equipo de ventas se pondrá en contacto contigo para darte retroalimentación";

        self::store($titulo, $mensaje, $adminSend->id);
    }

    private static function sendAdmins(string $titulo, string $mensaje) {
        $admins = Admin::admin()->get();
        foreach ($admins as $row) {
            self::store($titulo, $mensaje, $row->id);
        }
    }

    public static function store(string $titulo, string $mensaje, int $admin_id): Notificacion {
        return Notificacion::create([
            'titulo' => $titulo,
            'mensaje' => $mensaje,
            'admin_id' => $admin_id
        ]);
    }
}
