<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TestimonialResource extends JsonResource
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
            'avatar'             => $this->resource->avatar,
            'avatarThumb'        => $this->resource->avatar_thumb,
            'name'               => $this->resource->name,
            'position'           => $this->resource->position,
            'email'              => $this->resource->email,
            'body'               => $this->resource->body,
            'createdAt'          => $this->resource->created_at,
            'createdAtForHumans' => $this->resource->created_at->diffForHumans(),
        ];
    }
}
