<?php

namespace App\Http\Resources\forms;

use App\Models\forms\Options;
use App\Models\forms\Questions;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class FormResponseResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
//        return parent::toArray($request);
        $question = Questions::select('type','ask')->find($this->questions_id);
        return [
            'id' => $this->questions_id,
            'type' => $question->type,
            'ask' => $question->ask,
            'response' => [
                'open_ended' => $this->open_ended_responses,
                'selected' => Options::whereIn('id',json_decode($this->selected_responses))->select('id','descriptions')->get()
            ]
        ];
    }
}
