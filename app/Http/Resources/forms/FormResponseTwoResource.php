<?php

namespace App\Http\Resources\forms;

use App\Models\forms\Responses;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Auth;

class FormResponseTwoResource extends JsonResource
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
            'responded' => Responses::where('forms_id','=',$this->id)->where('users_id','=',Auth::id())->count() >= 1
        ];
    }
}
