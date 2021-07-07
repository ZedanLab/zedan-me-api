<?php

namespace App\Models;

use App\Traits\Hashidable;
use Spatie\Image\Image;
use Spatie\MediaLibrary\MediaCollections\Models\Media as Model;

class Media extends Model
{
    use Hashidable;

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = ['hashed_id'];

    /**
     * ----------------------------------------------------------------- *
     * --------------------------- Relations --------------------------- *
     * ----------------------------------------------------------------- *.
     */

    /*
     * ----------------------------------------------------------------- *
     * --------------------------- Accessors --------------------------- *
     * ----------------------------------------------------------------- *
     */

    /**
     * Retrieve media url attribute.
     *
     * @return string
     */
    public function getUrlAttribute()
    {
        return $this->getUrl();
    }

    /**
     * Retrieve image dimensions attribute.
     *
     * @return string
     */
    public function getDimensionsAttribute()
    {
        return Image::load($this->getPath())->getWidth().'x'.Image::load($this->getPath())->getHeight();
    }

    /*
     * ----------------------------------------------------------------- *
     * ---------------------------- Mutators --------------------------- *
     * ----------------------------------------------------------------- *
     */

    /*
     * ----------------------------------------------------------------- *
     * ----------------------------- Scopes ---------------------------- *
     * ----------------------------------------------------------------- *
     */

    /*
     * ----------------------------------------------------------------- *
     * ------------------------------ Misc ----------------------------- *
     * ----------------------------------------------------------------- *
     */
    //
}
