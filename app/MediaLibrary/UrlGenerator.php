<?php

namespace App\MediaLibrary;

use App\Models\Media;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;
use Spatie\MediaLibrary\Support\UrlGenerator\DefaultUrlGenerator;

class UrlGenerator extends DefaultUrlGenerator
{
    /**
     * Get the url for a media item.
     *
     * @return string
     */
    public function getUrl(): string
    {
        // Collection name.
        $collection = $this->media->collection_name;
        // Conversion name or set DEFAULT conversion.
        $conversion = optional($this->conversion)->getName() ?? 'default';
        // Media item.
        $media = Media::getEncodedId($this->media->id);
        // Item name.
        $name = Str::slug($this->media->name);

        if (Route::has('mediacenter::item.display')) {
            return route('mediacenter::item.display', [$collection, $conversion, $media, $name]);
        }

        return 'https://'.config('app.url')."/media/show/{$collection}/{$conversion}/{$media}/{$name}.jpg";
    }

    /**
     * Get the url to the directory containing responsive images.
     *
     * @return string
     */
    public function getResponsiveImagesDirectoryUrl(): string
    {
        return route(
            'mediacenter::responsive.display',
            [
                // Collection name.
                $this->media->collection_name,
                // Conversion name or set DEFAULT conversion.
                optional($this->conversion)->getName() ?? 'default',
                // Media item.
                Media::getEncodedId($this->media->id),
            ]
        ).'/';

        return $this->getBaseMediaDirectoryUrl().'/'.$this->pathGenerator->getPathForResponsiveImages($this->media);
    }
}
