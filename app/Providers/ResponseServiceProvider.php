<?php

namespace App\Providers;

use Illuminate\Http\Response;
use Illuminate\Support\ServiceProvider;

class ResponseServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        Response::macro('success', static fn($data, $massage = null, $code = 200) => response()->json(
            [
                "success" => true,
                "massage" => $massage,
                "result" => $data,
            ],
            $code,
            [
                'Content-Type' => 'application/json;charset=UTF-8',
                'Charset' => 'utf-8',
            ],
            JSON_UNESCAPED_UNICODE
        ));

        Response::macro('error', static fn($error , $code = 400, $massage = null) => response()->json(
            [
                'success' => false,
                'error' => $error,
                'massage' => $massage
            ],
            $code,
            [
                'Content-Type' => 'application/json;charset=UTF-8',
                'Charset' => 'utf-8',
            ],
            JSON_UNESCAPED_UNICODE
        ));
    }
}
