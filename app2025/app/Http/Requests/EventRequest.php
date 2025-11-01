<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EventRequest extends FormRequest
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
            'title' => 'required|min:30',
            'description' => 'required',
            'body' => 'required',
            'start' => 'required',
            'end' => 'required',

        ];
    }

    public function messages(): array
    {
        return [
                'title.required' => 'Este campo de Títuilo é obrigatório',
                'required' => 'Este campo é obrigatório',
                'min' => 'Este campo requer mais caracteres. Mínimo é de :min'
            ];
    }
}
