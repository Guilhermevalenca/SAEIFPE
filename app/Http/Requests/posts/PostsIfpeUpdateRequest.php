<?php

namespace App\Http\Requests\posts;

use Illuminate\Foundation\Http\FormRequest;

class PostsIfpeUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => ['required','string'],
            'content' => ['required','string'],
            'send_to' => ['nullable', 'array', 'in:ADM,IPI,LOG,TGQ,TSI,ALL,all'],
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
