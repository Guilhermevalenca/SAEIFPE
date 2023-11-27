<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

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
        $nowTime = Carbon::now();
        $creationDate = Carbon::parse($this->created_at);
        $updateDate = Carbon::parse($this->updated_at);
        $differenceInMinutes = null;

        if($creationDate->diffInSeconds($updateDate) !== 0) {
            $differenceInMinutes = $updateDate->diffInMinutes($nowTime);
        }
        return [
            'id' => $this->id,
            'title' => $this->title,
            'content' => $this->content,
            'send_to' => json_decode($this->send_to),
            'user' => $this->user->name,
            'form_id' => $this->form_id,
            'img' => $this->img,
            'form' => $this->form,
            'time' => $creationDate->diffInMinutes($nowTime),
            'time_edit' => $differenceInMinutes
        ];
    }
}
