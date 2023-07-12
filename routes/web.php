<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\CotizacionController;
use App\Http\Controllers\UsuarioController;
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

Route::get('/', [AuthController::class, 'login'])->name('login');
Route::post('/', [AuthController::class, 'loginPOST'])->name('loginPOST');

Route::middleware('auth')->group(function() {
  Route::resource('/admin', AdminController::class);
  Route::resource('/clientes', ClienteController::class)->names('clientes');
  Route::resource('/usuarios', UsuarioController::class)->names('usuarios');
  Route::resource('/cotizaciones', CotizacionController::class);
});

