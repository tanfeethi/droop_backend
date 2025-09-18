<?php

namespace App\Traits;

use App\Helpers\ImageHelper;

trait HasImageUrl
{
    /**
     * Get image URL for any image field
     * Usage: $model->getImageUrl('field_name')
     */
    public function getImageUrl($field)
    {
        return ImageHelper::getImageUrl($this->attributes[$field] ?? null);
    }

    /**
     * Get multiple image URLs
     * Usage: $model->getImageUrls(['field1', 'field2'])
     */
    public function getImageUrls($fields)
    {
        $urls = [];
        foreach ($fields as $field) {
            $urls[$field] = $this->getImageUrl($field);
        }
        return $urls;
    }

    /**
     * Common image field accessors
     */
    public function getImagePathAttribute()
    {
        return $this->getImageUrl('image');
    }

    public function getBackgroundPathAttribute()
    {
        return $this->getImageUrl('background');
    }

    public function getAvatarPathAttribute()
    {
        return $this->getImageUrl('avatar');
    }

    public function getLogoPathAttribute()
    {
        return $this->getImageUrl('logo');
    }

    public function getPhotoPathAttribute()
    {
        return $this->getImageUrl('photo');
    }

    public function getThumbnailPathAttribute()
    {
        return $this->getImageUrl('thumbnail');
    }
}
