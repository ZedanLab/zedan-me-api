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
     * @return \Symfony\Component\HttpFoundation\BinaryFileResponse
     */
    public function display(string $collection, string $conversionName, Media $media): BinaryFileResponse
    {
        if ($conversionName == 'default') {
            $conversionName = '';
        }

        $path = file_exists($path = $this->getFilePath($media, $conversionName))
        ? $path : public_path('storage/image.jpg');

        return response()->file($path);
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
}
