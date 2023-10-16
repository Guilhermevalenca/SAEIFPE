<?php

namespace App\Http\Resources;

use App\Http\Resources\PostsIfpe\PostsIfpeUsersResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\User;

class PostsIfpeResource extends JsonResource
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
            'title' => $this->title,
            'content' => $this->content,
            'send_to' => json_decode($this->send_to),
            'user' => new PostsIfpeUsersResource( User::findOrFail($this->user_id) )
        ];
    }
}
