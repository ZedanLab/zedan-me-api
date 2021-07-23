<?php

namespace App\Models;

use App\Http\Resources\ContactMessageResource;
use App\Traits\Hashidable;
use Illuminate\Database\Eloquent\Model;

class ContactMessage extends Model
{
    use Hashidable;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'contact_messages';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'position',
        'subject',
        'body',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = ['hashed_id'];

    /*
     * ----------------------------------------------------------------- *
     * --------------------------- Accessors --------------------------- *
     * ----------------------------------------------------------------- *
     */

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

    /**
     * Convert the model instance to an array.
     *
     * @return array
     */
    public function toArray()
    {
        return ContactMessageResource::make($this)->toArray(request());
    }
}
