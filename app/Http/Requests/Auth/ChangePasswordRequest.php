<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class ChangePasswordRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'current_password' => 'required|min:6',
            'new_password' => 'required|min:6|max:40',
            'confirm_password' => 'required|same:new_password|min:6|max:40'
        ];
    }

    public function attributes()
    {
        return [
            'current_password' => 'Senha atual',
            'new_password' => 'Nova senha',
            'confirm_password' => 'Confirme a nova senha'
        ];
    }
}
