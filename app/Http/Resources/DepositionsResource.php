<?php

namespace App\Http\Resources;

use App\Models\User;
use App\Models\UsersGraduates;
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
        $user= User::where('id','=',$this->user_id)->get();
        $userGraduate = UsersGraduates::where('users_id','=',$this->user_id)->get();
        $userGraduate = $userGraduate[0];
        $user = $user[0];
//        return parent::toArray($request);
        return [
            'id' => $this->id,
            'user'=> [$user,$userGraduate],
            'content' => $this->content,
            'picture' => $this->picture
        ];
    }
}
