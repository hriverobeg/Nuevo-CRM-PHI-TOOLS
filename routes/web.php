<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Api\CotizacionController as ApiCotizacionController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\CotizacionController;
use App\Http\Controllers\CotizacionDescargarController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UsuarioController;
use App\Http\Middleware\VerifyIsAdmin;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/mail/cotizacion', function () {
//     //return view('mails.cotizacion');

//     $cotizacion = Cotizacion::with('cliente', 'usuario')->latest()->first();

//     $email =  $cotizacion->usuario?->email ?? $cotizacion->cliente?->email;
//     Mail::to($email)->send(new CotizacionMail($cotizacion));
// });

Route::get('/route-cache', function() {
    \Artisan::call('route:cache');
    return 'Routes cache cleared';
});

 //Clear config cache
 Route::get('/config-cache', function() {
    \Artisan::call('config:cache');
    return 'Config cache cleared';
});

Route::get('/cotizacion-descargar', CotizacionDescargarController::class);
Route::get('/', [AuthController::class, 'login'])->name('login');
Route::post('/', [AuthController::class, 'loginPOST'])->name('loginPOST');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware('auth')->group(function() {
  Route::resource('/admin', AdminController::class)->middleware(VerifyIsAdmin::class);
  Route::get('/dashboard-admin', [DashboardController::class, 'admin'])->middleware(VerifyIsAdmin::class);
  Route::get('/dashboard-cliente', [DashboardController::class, 'cliente']);
  Route::resource('/usuarios', ClienteController::class)->names('clientes')->middleware(VerifyIsAdmin::class);
  Route::resource('/clientes', UsuarioController::class)->names('usuarios');
  Route::resource('/cotizaciones', CotizacionController::class);
  Route::prefix('api')->group(function() {
    Route::apiResource('cotizacion', ApiCotizacionController::class)->names('apicotizaciones')->only('update');
  });
});

