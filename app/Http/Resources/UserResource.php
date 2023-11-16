<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
//        return parent::toArray($request);

        $profile = null;

        if (!is_null($this->profile_picture)) {
            $profileData = json_decode($this->profile_picture);

            // Verifica se a decodificação do JSON foi bem-sucedida e se 'mimeType' e 'base64' estão definidos
            if ($profileData && isset($profileData->mimeType, $profileData->base64)) {
                $profile = 'data:' . $profileData->mimeType . ';base64,' . $profileData->base64;
            }
        }
        return [
            'id' => $this->id,
            'name' => $this->name,
            'cpf' => $this->cpf,
            'email' => $this->email,
            'role' => $this->role,
            'profile_picture' => $profile
        ];
    }
}
