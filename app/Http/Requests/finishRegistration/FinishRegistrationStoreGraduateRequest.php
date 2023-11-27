<?php

namespace App\Http\Requests\finishRegistration;

use Illuminate\Foundation\Http\FormRequest;

class FinishRegistrationStoreGraduateRequest extends FormRequest
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
            'course' => ['required', 'string'],
            'genre' => ['required', 'string'],
            'phone' => ['required', 'string'],
        ];
    }
    public function messages(): array
    {
        return [
            'course.required' => 'É necessário adicionar seu curso',
            'course.string' => 'Valor invalído para curso',
            'genre.required' => 'É necessário adicionar seu genero',
            'genre.string' => 'Valor invalido para genero',
            'phone.required' => 'É necessário adicionar seu telefone',
            'phone.string' => 'Valor invalído para telefone'
        ];
    }
}
