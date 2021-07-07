<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Model;
use Vinkla\Hashids\Facades\Hashids;

trait Hashidable
{
    /**
     * Retrieve model hashed_id attribute.
     *
     * @return string
     */
    public function getHashedIdAttribute()
    {
        return static::getEncodedId($this);
    }

    /**
     * Retrieve the model for a bound value.
     *
     * @param  mixed                                      $value
     * @param  string|null                                $field
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function resolveRouteBinding($value, $field = null)
    {
        $value = static::getDecodedId($value);

        return $this->where($this->getRouteKeyName(), $value)->first();
    }

    /**
     * @return string
     */
    public static function getHashidConnection()
    {
        return get_called_class();
    }

    /**
     * @param  \Illuminate\Database\Eloquent\Model|int $model
     * @return mixed
     */
    public static function getEncodedId($model)
    {
        $id = $model instanceof Model ? $model->id : $model;

        return Hashids::connection(static::getHashidConnection())->encode($id);
    }

    /**
     * @param  string  $hashedId
     * @return mixed
     */
    public static function getDecodedId($hashedId)
    {
        return Hashids::connection(static::getHashidConnection())->decode($hashedId)[0] ?? null;
    }

    /**
     * Get the value of the model's route key.
     *
     * @return mixed
     */
    public function getRouteKey()
    {
        return static::getEncodedId($this);
    }

    /**
     * Scope a query to get with hased ID.
     *
     * @param  \Illuminate\Database\Eloquent\Builder   $query
     * @param  string                                  $hashedId
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeFindByHashedId($query, string $hashedId)
    {
        $value = static::getDecodedId($hashedId);

        return $query->where($this->getRouteKeyName(), $value);
    }

    /**
     * Scope a query to get with hased ID.
     *
     * @param  string                              $hashedId
     * @param  array                               $columns
     * @return \Illuminate\Database\Eloquent\Model $model
     */
    public static function findByHashedIdOrFail(string $hashedId, $columns = ['*'])
    {
        $value = static::getDecodedId($hashedId);

        return static::where((new static )->getRouteKeyName(), $value)->select($columns)->firstOrFail();
    }
}
