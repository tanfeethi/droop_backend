<?php

namespace App\Http\Controllers;

use App\Traits\ApiResponseTrait;
use Illuminate\Http\Request;

abstract class BaseController extends Controller
{
    use ApiResponseTrait;

    /**
     * Handle model not found safely
     */
    protected function findOrFail($model, $id, $message = 'Resource not found')
    {
        $resource = $model::find($id);
        
        if (!$resource) {
            return $this->sendNotFound($message);
        }
        
        return $resource;
    }

    /**
     * Handle model not found by field safely
     */
    protected function findOrFailByField($model, $field, $value, $message = 'Resource not found')
    {
        $resource = $model::where($field, $value)->first();
        
        if (!$resource) {
            return $this->sendNotFound($message);
        }
        
        return $resource;
    }

    /**
     * Validate request safely
     */
    protected function validateRequest(Request $request, $rules, $messages = [])
    {
        try {
            return $request->validate($rules, $messages);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return $this->sendValidationError($e->errors());
        }
    }
}