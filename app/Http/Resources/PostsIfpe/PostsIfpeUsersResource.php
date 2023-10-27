<?php

namespace App\Http\Resources\PostsIfpe;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PostsIfpeUsersResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
//        return parent::toArray($request);
        return [
            'id' => $this->id,
            'name' => $this->name
        ];
    }
}
