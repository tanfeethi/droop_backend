<?php

namespace App\Helpers;

class ImageHelper
{
    /**
     * Generate dynamic image URL for any uploaded file
     * Works for all modules and all image types
     */
    public static function getImageUrl($path)
    {
        if (!$path) {
            return null;
        }

        // If it's already a full URL, return it
        if (filter_var($path, FILTER_VALIDATE_URL)) {
            return $path;
        }

        // Remove 'storage/' if it exists in the path
        $path = ltrim($path, 'storage/');
        
        // Generate dynamic URL using current domain
        return asset('storage/' . $path);
    }

    /**
     * Get all image URLs from an array of paths
     */
    public static function getImageUrls($paths)
    {
        if (!is_array($paths)) {
            return self::getImageUrl($paths);
        }

        return array_map(function($path) {
            return self::getImageUrl($path);
        }, $paths);
    }
}
