<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Response;

class ApiResponseServiceProvider extends ServiceProvider
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
        // Register custom response macros
        Response::macro('apiSuccess', function ($data = [], $message = '', $code = 200) {
            return response()->json([
                'data' => $data,
                'status' => 'success',
                'error' => '',
                'message' => $message,
                'code' => $code
            ], $code);
        });

        Response::macro('apiError', function ($message, $code = 400, $errors = []) {
            return response()->json([
                'data' => [],
                'status' => 'fail',
                'error' => $message,
                'errors' => $errors,
                'code' => $code
            ], $code);
        });

        Response::macro('apiNotFound', function ($message = 'Resource not found') {
            return response()->json([
                'data' => [],
                'status' => 'fail',
                'error' => $message,
                'code' => 404
            ], 404);
        });
    }
}