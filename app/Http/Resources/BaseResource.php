<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

abstract class BaseResource extends JsonResource
{
    /**
     * Handle null properties safely
     */
    protected function safeGet($property, $default = null)
    {
        return $this->resource ? ($this->resource->{$property} ?? $default) : $default;
    }

    /**
     * Handle null arrays safely
     */
    protected function safeArray($property, $default = [])
    {
        $value = $this->safeGet($property, $default);
        return is_array($value) ? $value : $default;
    }

    /**
     * Handle null strings safely
     */
    protected function safeString($property, $default = '')
    {
        $value = $this->safeGet($property, $default);
        return is_string($value) ? $value : $default;
    }

    /**
     * Handle null integers safely
     */
    protected function safeInt($property, $default = 0)
    {
        $value = $this->safeGet($property, $default);
        return is_numeric($value) ? (int)$value : $default;
    }
}