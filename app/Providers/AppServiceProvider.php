<?php

namespace App\Providers;

use Blade;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\ServiceProvider;
use App\Models\User;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Response::macro('errorResponse', function ($message, int $status) : JsonResponse {
            return Response::json(['message' => $message, 'code' => $status], $status);
        });

        Blade::if('permiso', function (string $permiso) : bool {
            $user = User::find(auth()->id());
            return $user->hasPermission($permiso);
        });
    }
}
