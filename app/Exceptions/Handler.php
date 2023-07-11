<?php

namespace App\Exceptions;

use Dotenv\Exception\ValidationException;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Support\Facades\Response;
use Symfony\Component\HttpKernel\Exception\HttpExceptionInterface;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * The list of the inputs that are never flashed to the session on validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     */
    public function register(): void
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }

    public function render($request, Throwable $exception) {
        if (strpos($request->path(), "api") !== false) {
            return $this->handleApiException($request, $exception);
        } else {
            $retval = parent::render($request, $exception);
        }

        return $retval;
    }

    private function handleApiException($request, Throwable $exception){
        if ($exception instanceof AuthorizationException) {
            return Response::errorResponse('You do not have permissions to execute this action', 403);
        }

        if ($exception instanceof ValidationException) {
            return Response::errorResponse($exception->getMessage(), 422);
        }

        if ($exception instanceof DirtyException) {
            return Response::errorResponse('At least one different value must be specified to update', 409);
        }

        if ($exception instanceof NotFoundHttpException || $exception instanceof ModelNotFoundException) {
            return Response::errorResponse('The specified resource was not found', 404);
        }


        if ($exception instanceof AuthenticationException) {
            return Response::errorResponse($exception->getMessage(), 401);
        }
        if ($exception instanceof HttpExceptionInterface) {
            if ($exception->getStatusCode() == 403) {
                return Response::errorResponse('You do not have permissions to execute this action', $exception->getStatusCode());
            }
            if ($exception->getStatusCode() == 422) {
                return Response::errorResponse($exception->getMessage(), $exception->getStatusCode());
            }
        }
        
        return Response::errorResponse($exception->getMessage(), 500);
        
        
    }
}
