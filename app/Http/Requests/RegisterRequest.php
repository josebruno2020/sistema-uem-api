<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|string|min:2',
            'phone' => 'required|string',
            'email' => 'required|email|string',
            'password' => 'required|string|confirmed'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Campo nome é obrigatório',
            'phone.required' => 'Campo telefone é obrigatório',
            'email.required' => 'Campo e-mail é obrigatório',
            'password.required' => 'Campo senha é obrigatório',
            'name.min' => 'Campo nome deve ter mais que 2 caracteres',
            'password.confirmed' => 'Senhas não coincidem'

        ];
    }
}
