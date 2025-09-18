<?php

namespace App\Traits;

trait ApiResponseTrait
{
    /**
     * Send success response
     */
    protected function sendResponse($data, $message = '', $code = 200): \Illuminate\Http\JsonResponse
    {
        return response()->json([
            'data' => $data,
            'status' => 'success',
            'error' => '',
            'message' => $message,
            'code' => $code
        ], $code);
    }

    /**
     * Send error response
     */
    protected function sendError($message, $code = 400, $errors = []): \Illuminate\Http\JsonResponse
    {
        return response()->json([
            'data' => [],
            'status' => 'fail',
            'error' => $message,
            'errors' => $errors,
            'code' => $code
        ], $code);
    }

    /**
     * Send validation error response
     */
    protected function sendValidationError($errors, $message = 'Validation failed'): \Illuminate\Http\JsonResponse
    {
        return response()->json([
            'data' => [],
            'status' => 'fail',
            'error' => $message,
            'errors' => $errors,
            'code' => 422
        ], 422);
    }

    /**
     * Send not found response
     */
    protected function sendNotFound($message = 'Resource not found'): \Illuminate\Http\JsonResponse
    {
        return response()->json([
            'data' => [],
            'status' => 'fail',
            'error' => $message,
            'code' => 404
        ], 404);
    }

    /**
     * Send unauthorized response
     */
    protected function sendUnauthorized($message = 'You are not authenticated'): \Illuminate\Http\JsonResponse
    {
        return response()->json([
            'data' => [],
            'status' => 'fail',
            'error' => $message,
            'code' => 401
        ], 401);
    }

    /**
     * Send forbidden response
     */
    protected function sendForbidden($message = 'Access denied'): \Illuminate\Http\JsonResponse
    {
        return response()->json([
            'data' => [],
            'status' => 'fail',
            'error' => $message,
            'code' => 403
        ], 403);
    }
}