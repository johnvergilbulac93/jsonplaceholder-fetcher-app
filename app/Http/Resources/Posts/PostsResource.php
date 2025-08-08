<?php

namespace App\Http\Resources\Posts;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PostsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'userId' => $this->user_id,
            'id' => $this->id,
            'title' => $this->title,
            'body' => $this->body,

        ];
    }
}
