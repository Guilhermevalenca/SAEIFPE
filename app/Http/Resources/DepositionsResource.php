<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DepositionsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
//        return parent::toArray($request);
        return[
            'id' => $this->id,
            'user'=> User::find($this->users_id),
            'content' => $this->content,
            'picture' => $this->picture,
            'school' => $this->school
        ];
    }
}
