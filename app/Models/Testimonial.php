<?php

namespace App\Models;

use App\Http\Resources\TestimonialResource;
use App\Traits\Hashidable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Testimonial extends Model implements HasMedia
{
    use HasFactory, Hashidable, InteractsWithMedia;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'testimonials';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'avatar',
        'name',
        'email',
        'position',
        'body',
        'stars',
        'is_published',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = ['hashed_id'];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'is_published' => 'boolean',
        'stars'        => 'integer',
    ];

    /*
     * ----------------------------------------------------------------- *
     * --------------------------- Accessors --------------------------- *
     * ----------------------------------------------------------------- *
     */

    /**
     * Retrieve creator avatar attribute.
     *
     * @return string
     */
    public function getAvatarAttribute()
    {
        return ! blank($media = $this->getFirstMediaUrl('avatar', 'big')) ? $media : url(Storage::url('public/avatar.jpg'));
    }

    /**
     * Retrieve creator avatar_thumb attribute.
     *
     * @return string
     */
    public function getAvatarThumbAttribute()
    {
        return ! blank($media = $this->getFirstMediaUrl('avatar', 'thumb')) ? $media : url(Storage::url('public/avatar.jpg'));
    }

    /*
     * ----------------------------------------------------------------- *
     * ---------------------------- Mutators --------------------------- *
     * ----------------------------------------------------------------- *
     */

    /**
     * Set creator avatar attribute.
     *
     * @param  mixed  $avatar
     * @return void
     */
    public function setAvatarAttribute($avatar)
    {
        try {
            $avatar = is_string($avatar) ? $this->addMediaFromUrl($avatar) : $this->addMedia($avatar);

            $avatar->setName("{$this->hashed_id}_avatar")
                   ->setFileName("{$this->hashed_id}-avatar")
                   ->toMediaCollection('avatar');
        } catch (\Throwable $th) {
        }
    }

    /*
     * ----------------------------------------------------------------- *
     * ----------------------------- Scopes ---------------------------- *
     * ----------------------------------------------------------------- *
     */

    /**
     * Scope to get published testimonials.
     *
     * @param  \Illuminate\Database\Eloquent\Builder   $builder
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopePublished(Builder $query): Builder
    {
        return $query->where('is_published', true);
    }

    /*
     * ----------------------------------------------------------------- *
     * ------------------------------ Misc ----------------------------- *
     * ----------------------------------------------------------------- *
     */

    /**
     * Register the media collections.
     *
     * @return void
     */
    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('avatar')
             ->singleFile();
    }

    /**
     * Register media conversions.
     *
     * @param Media $media
     */
    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')
             ->fit('crop', 100, 100)
             ->performOnCollections('avatar');

        // Perform a resize on every collection
        $this->addMediaConversion('big')
             ->fit('crop', 500, 500)
             ->performOnCollections('avatar');
    }

    /**
     * Convert the model instance to an array.
     *
     * @return array
     */
    public function toArray()
    {
        return TestimonialResource::make($this)->toArray(request());
    }
}
