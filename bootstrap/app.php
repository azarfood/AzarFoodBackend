<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpFoundation\Response as SymfonyResponse;
use Illuminate\Http\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        //
    })
    ->withExceptions(function (Exceptions $exceptions) {
        $exceptions->respond(function (SymfonyResponse $response) {
            $error = json_decode($response->getContent());
            return Response::error($error, $response->getStatusCode());
        });

        $exceptions->renderable(function (ValidationException $e) {
            return response()->json(
                $e->validator->errors()
                , 422);
        });

        $exceptions->renderable(function (NotFoundHttpException $e) {
            return response()->json(
                $e->getMessage()
                , 422);
        });
    })->create();
