<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * App\Models\Admin
 *
 * @property int $id
 * @property int $nivel_id
 * @property string $nombre
 * @property string $email
 * @property string $password
 * @property string|null $telefono
 * @property string|null $empresa
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property float $interes
 * @property float $comisionPorcentaje
 * @method static \Illuminate\Database\Eloquent\Builder|Admin admin()
 * @method static \Illuminate\Database\Eloquent\Builder|Admin cliente()
 * @method static \Illuminate\Database\Eloquent\Builder|Admin newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Admin newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Admin onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Admin query()
 * @method static \Illuminate\Database\Eloquent\Builder|Admin whereComisionPorcentaje($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Admin whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Admin whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Admin whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Admin whereEmpresa($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Admin whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Admin whereInteres($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Admin whereNivelId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Admin whereNombre($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Admin wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Admin whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Admin whereTelefono($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Admin whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Admin withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Admin withoutTrashed()
 */
	class Admin extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Board
 *
 * @property int $id
 * @property string $nombre
 * @property int $nivel_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Cotizacion> $cotizaciones
 * @property-read int|null $cotizaciones_count
 * @method static \Illuminate\Database\Eloquent\Builder|Board clientes($adminId)
 * @method static \Illuminate\Database\Eloquent\Builder|Board newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Board newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Board query()
 * @method static \Illuminate\Database\Eloquent\Builder|Board whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Board whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Board whereNivelId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Board whereNombre($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Board whereUpdatedAt($value)
 */
	class Board extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Cotizacion
 *
 * @property int $id
 * @property int|null $usuario_id
 * @property int|null $cliente_id
 * @property int $admin_id
 * @property \App\Enums\BoardEnum $board_id
 * @property string $nombreActivo
 * @property string $anio
 * @property string $tituloCotizacion
 * @property float $valorActivo
 * @property float $anticipo
 * @property float $anticipoPorcentaje
 * @property float $comisionPorApertura
 * @property float $comisionPorcentaje
 * @property float $interes
 * @property float $valorSeguro
 * @property string $tipoActivo
 * @property string|null $otro
 * @property float $valorResidual24
 * @property float $valorResidual36
 * @property float $valorResidual48
 * @property float $valorResidual60
 * @property float|null $valorResidual24Cantidad
 * @property float|null $valorResidual36Cantidad
 * @property float|null $valorResidual48Cantidad
 * @property float|null $valorResidual60Cantidad
 * @property bool $isTelematics
 * @property bool $isSeguro
 * @property bool $is24
 * @property bool $is36
 * @property bool $is48
 * @property bool $is60
 * @property bool $isAlivioFiscal
 * @property int|null $grupo
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\Admin|null $admin
 * @property-read \App\Models\Board|null $board
 * @property-read \App\Models\Admin|null $cliente
 * @property-read mixed $fecha
 * @property-read \App\Models\Usuario|null $usuario
 * @method static \Illuminate\Database\Eloquent\Builder|Cotizacion clienteBoard($clienteId, $boardId)
 * @method static \Illuminate\Database\Eloquent\Builder|Cotizacion newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Cotizacion newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Cotizacion onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Cotizacion query()
 * @method static \Illuminate\Database\Eloquent\Builder|Cotizacion whereAdminId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cotizacion whereAnio($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cotizacion whereAnticipo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cotizacion whereAnticipoPorcentaje($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cotizacion whereBoardId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cotizacion whereClienteId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cotizacion whereComisionPorApertura($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cotizacion whereComisionPorcentaje($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cotizacion whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cotizacion whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cotizacion whereGrupo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cotizacion whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cotizacion whereInteres($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cotizacion whereIs24($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cotizacion whereIs36($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cotizacion whereIs48($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cotizacion whereIs60($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cotizacion whereIsAlivioFiscal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cotizacion whereIsSeguro($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cotizacion whereIsTelematics($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cotizacion whereNombreActivo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cotizacion whereOtro($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cotizacion whereTipoActivo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cotizacion whereTituloCotizacion($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cotizacion whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cotizacion whereUsuarioId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cotizacion whereValorActivo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cotizacion whereValorResidual24($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cotizacion whereValorResidual24Cantidad($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cotizacion whereValorResidual36($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cotizacion whereValorResidual36Cantidad($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cotizacion whereValorResidual48($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cotizacion whereValorResidual48Cantidad($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cotizacion whereValorResidual60($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cotizacion whereValorResidual60Cantidad($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cotizacion whereValorSeguro($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cotizacion withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Cotizacion withoutTrashed()
 */
	class Cotizacion extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Nivel
 *
 * @property int $id
 * @property string $nombre
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Nivel newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Nivel newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Nivel query()
 * @method static \Illuminate\Database\Eloquent\Builder|Nivel whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Nivel whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Nivel whereNombre($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Nivel whereUpdatedAt($value)
 */
	class Nivel extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Notificacion
 *
 * @property int $id
 * @property int $admin_id
 * @property string $titulo
 * @property string $mensaje
 * @property string|null $leido_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read mixed $fecha
 * @method static \Illuminate\Database\Eloquent\Builder|Notificacion newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Notificacion newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Notificacion onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Notificacion query()
 * @method static \Illuminate\Database\Eloquent\Builder|Notificacion whereAdminId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Notificacion whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Notificacion whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Notificacion whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Notificacion whereLeidoAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Notificacion whereMensaje($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Notificacion whereTitulo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Notificacion whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Notificacion withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Notificacion withoutTrashed()
 */
	class Notificacion extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\TipoArchivo
 *
 * @property int $id
 * @property string $nombre
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @method static \Illuminate\Database\Eloquent\Builder|TipoArchivo newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TipoArchivo newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TipoArchivo onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|TipoArchivo query()
 * @method static \Illuminate\Database\Eloquent\Builder|TipoArchivo whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TipoArchivo whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TipoArchivo whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TipoArchivo whereNombre($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TipoArchivo whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TipoArchivo withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|TipoArchivo withoutTrashed()
 */
	class TipoArchivo extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Usuario
 *
 * @property int $id
 * @property int $admin_id
 * @property string $nombre
 * @property string $email
 * @property string $telefono
 * @property string|null $empresa
 * @property string|null $direccion_empresa
 * @property string|null $giro_empresa
 * @property string|null $website_empresa
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @method static \Illuminate\Database\Eloquent\Builder|Usuario newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Usuario newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Usuario onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Usuario query()
 * @method static \Illuminate\Database\Eloquent\Builder|Usuario whereAdminId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Usuario whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Usuario whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Usuario whereDireccionEmpresa($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Usuario whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Usuario whereEmpresa($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Usuario whereGiroEmpresa($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Usuario whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Usuario whereNombre($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Usuario whereTelefono($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Usuario whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Usuario whereWebsiteEmpresa($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Usuario withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Usuario withoutTrashed()
 */
	class Usuario extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\UsuarioArchivo
 *
 * @property int $id
 * @property string $nombre
 * @property int $usuario_id
 * @property int $tipo_archivo_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|UsuarioArchivo archivos($usuarioId, $tipoArchivoId)
 * @method static \Illuminate\Database\Eloquent\Builder|UsuarioArchivo newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UsuarioArchivo newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UsuarioArchivo query()
 * @method static \Illuminate\Database\Eloquent\Builder|UsuarioArchivo whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UsuarioArchivo whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UsuarioArchivo whereNombre($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UsuarioArchivo whereTipoArchivoId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UsuarioArchivo whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UsuarioArchivo whereUsuarioId($value)
 */
	class UsuarioArchivo extends \Eloquent {}
}

