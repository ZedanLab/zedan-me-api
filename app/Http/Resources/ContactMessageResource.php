<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ContactMessageResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id'                 => $this->resource->hashed_id,
            'name'               => $this->resource->name,
            'email'              => $this->resource->email,
            'position'           => $this->resource->position,
            'subject'            => $this->resource->subject,
            'body'               => $this->resource->body,
            'createdAt'          => $this->resource->created_at,
            'createdAtForHumans' => $this->resource->created_at->diffForHumans(),
        ];
    }
}
