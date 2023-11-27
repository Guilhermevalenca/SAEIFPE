<?php

namespace App\Http\Requests\form;

use Illuminate\Foundation\Http\FormRequest;

class FormsSearchByTitleRequest extends FormRequest
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
            'title' => ['required', 'string']
        ];
    }
    public function messages(): array
    {
        return [
            'title.required' => 'É necessário Digitar o titulo do formulário',
            'title.string' => 'É necessário digitar um valor valido para pesquisa'
        ];
    }
}
