<?php

namespace App\Http\Requests\finishRegistration;

use Illuminate\Foundation\Http\FormRequest;

class FinishRegistrationStoreStudentRequest extends FormRequest
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
            'email_institution' => ['required', 'email'],
            'enrollment' => ['required','string'],
            'course' => ['required','string']
        ];
    }
    public function messages(): array
    {
        return [
            'email_institution.required' => 'É necessário preencher seu email institucional',
            'email_institution.email' => 'Valor invalído, é necessário preencher um email valido',
            'enrollment.required' => 'É necessário preencher sua matricula',
            'enrollment.string' => 'Valor invalído para matricula',
            'course.required' => 'É necessário dizer qual seu curso',
            'course.string' => 'Valor invalído para curso'
        ];
    }
}
