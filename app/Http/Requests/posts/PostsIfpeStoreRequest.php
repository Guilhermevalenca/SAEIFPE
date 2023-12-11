<?php

namespace App\Http\Requests\posts;

use Illuminate\Foundation\Http\FormRequest;

class PostsIfpeStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title' => ['required','string'],
            'content' => ['required','string'],
            'send_to' => ['nullable', 'array', 'in:ADM,IPI,LOG,TGQ,TSI'],
            'form_id' => ['nullable', 'exists:forms,id'],
        ];
    }
    public function messages(): array
    {
        return [
            'title.required' => 'Você precisa adicionar um titulo',
            'title.string' => 'Você adicionou um valor inválido',
            'content.required' => 'É necessário adicionar algum conteúdo',
            'content.string' => 'Você adicionou um valor inválido',
            'send_to.array' => 'Valor inválido',
            'send_to.in' => 'Você adicionou um valor errado',
            'form_id.exists' => 'Você precisa adicionar um formulário valido'
        ];
    }
}
