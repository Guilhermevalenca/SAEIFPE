<?php

namespace App\Http\Requests\form;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class FormsRequest extends FormRequest
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
            'title' => ['required', 'string', 'unique:forms,title,null,id,user_id,' . Auth::id()],
            'questions' => ['required', 'array'],
            'questions.*.ask' => ['required', 'string'],
            'questions.*.options' => ['nullable', 'array'],
            'questions.*.type' => ['required', 'in:unique,multiple,open-ended'],
            'questions.*.options.*.descriptions' => ['nullable', 'string', 'required_with:questions.*.responses'],
        ];
    }

    public function messages(): array
    {
        return [
            'title.required' => 'O nome do formulário é obrigatório.',
            'title.string' => 'O nome do formulário foi preenchido de forma incorreta.',
            'title.unique' => 'Você já registrou esse nome para um formulário',
            'questions.required' => 'Pelo menos uma questão é necessária.',
            'questions.*.ask.required' => 'É necessário adicionar a pergunta.',
            'questions.*.ask.string' => 'A pergunta foi preenchida de forma incorreta.',
            'questions.*.options.*.descriptions.string' => 'A opção foi preenchida de forma incorreta.',
            'questions.*.options.*.descriptions.required_with' => 'É necessário preencher as opções',
            'questions.*.type.required' => 'O tipo de pergunta é obrigatório.',
            'questions.*.type.in' => 'O tipo de pergunta deve ser único, múltiplo ou aberto.',
        ];
    }
}
