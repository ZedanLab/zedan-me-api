<?php

namespace App\Http\Controllers\MediaCenter;

use App\Http\Controllers\Controller;
use App\Models\Media;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class UrlController extends Controller
{
    /**
     * Display selected media item.
     *
     * @param  string                                                 $collection
     * @param  string                                                 $conversionName
     * @param  \App\Models\Media                                      $media
     * @param  string                                                 $itemName
     * @return \Symfony\Component\HttpFoundation\BinaryFileResponse
     */
    public function display(string $collection, string $conversionName, Media $media, string $itemName): BinaryFileResponse
    {
        if ($conversionName == 'default') {
            $conversionName = '';
        }

        $path = file_exists($path = $this->getFilePath($media, $conversionName))
        ? $path : public_path('storage/image.jpg');

        return response()->file($path);
    }

    /**
     * Display selected responsive image.
     *
     * @param  string                                                 $collection
     * @param  string                                                 $conversionName
     * @param  Media                                                  $media
     * @param  string                                                 $itemName
     * @return \Symfony\Component\HttpFoundation\BinaryFileResponse
     */
    public function displayResponsiveImage(string $collection, string $conversionName, Media $media, string $itemName): BinaryFileResponse
    {
        return response()->file($this->getResponsiveImagePath($media, $itemName));
    }

    /**
     * Get the path of the selected media item file.
     *
     * @param  \App\Models\Media $media
     * @return string
     */
    private function getFilePath(Media $media, $conversionName = ''): string
    {
        return $media->getPath($conversionName);
    }

    /**
     * Get the path of the selected responsive image.
     *
     * @param  \App\Models\Media $media
     * @param  string            $itemName
     * @return string
     */
    private function getResponsiveImagePath(Media $media, string $itemName): string
    {
        return str_replace($media->file_name, 'responsive-images/'.$itemName, $media->getPath());
    }
}
