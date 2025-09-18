<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Auth\AuthenticationException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * A list of exception types with their corresponding custom log levels.
     */
    protected $levels = [
        //
    ];

    /**
     * A list of the exception types that are not reported.
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed to the session on validation exceptions.
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

    /**
     * Render an exception into an HTTP response.
     */
    public function render($request, Throwable $e): JsonResponse|\Illuminate\Http\Response|\Symfony\Component\HttpFoundation\Response
    {
        // Handle API requests
        if ($request->is('api/*')) {
            return $this->handleApiException($request, $e);
        }

        return parent::render($request, $e);
    }

    /**
     * Handle API exceptions with proper error messages
     */
    private function handleApiException(Request $request, Throwable $e): JsonResponse
    {
        if ($e instanceof ValidationException) {
            return response()->json([
                'data' => [],
                'status' => 'fail',
                'error' => 'Validation failed',
                'errors' => $e->errors(),
                'code' => 422
            ], 422);
        }

        if ($e instanceof ModelNotFoundException) {
            return response()->json([
                'data' => [],
                'status' => 'fail',
                'error' => 'Resource not found',
                'code' => 404
            ], 404);
        }

        if ($e instanceof AuthenticationException) {
            return response()->json([
                'data' => [],
                'status' => 'fail',
                'error' => 'You are not authenticated',
                'code' => 401
            ], 401);
        }

        if ($e instanceof NotFoundHttpException) {
            return response()->json([
                'data' => [],
                'status' => 'fail',
                'error' => 'Endpoint not found',
                'code' => 404
            ], 404);
        }

        if ($e instanceof MethodNotAllowedHttpException) {
            return response()->json([
                'data' => [],
                'status' => 'fail',
                'error' => 'Method not allowed',
                'code' => 405
            ], 405);
        }

        if ($e instanceof HttpException) {
            return response()->json([
                'data' => [],
                'status' => 'fail',
                'error' => $e->getMessage() ?: 'HTTP Error',
                'code' => $e->getStatusCode()
            ], $e->getStatusCode());
        }

        // Handle null property access
        if (strpos($e->getMessage(), 'Attempt to read property') !== false) {
            return response()->json([
                'data' => [],
                'status' => 'fail',
                'error' => 'Data not available',
                'code' => 404
            ], 404);
        }

        // Handle general exceptions
        return response()->json([
            'data' => [],
            'status' => 'fail',
            'error' => config('app.debug') ? $e->getMessage() : 'Internal server error',
            'code' => 500
        ], 500);
    }
}