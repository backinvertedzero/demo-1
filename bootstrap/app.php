<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Http\Request;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        api: __DIR__ . '/../routes/api.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
        then: function () {
            Route::prefix('api')->group(base_path('src/Modules/routes.php'));
        }
    )
    ->withMiddleware(function (Middleware $middleware): void {
        //
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        $exceptions->render(function (\Exception $exception, Request $request) {
            if ($request->is('api/*')) {
                $state = 500;
                if ($exception instanceof \Illuminate\Validation\ValidationException) {
                    $errors = $exception->errors();
                    $state = 400;
                } else {
                    $errors[] = $exception->getMessage();
                }

                return new \Illuminate\Http\JsonResponse([
                    'success' => false,
                    'errors' => $errors,
                ], $state);
            }
        });
    })->create();
