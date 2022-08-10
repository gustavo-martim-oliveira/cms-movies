<?php

namespace App\Http\Requests\Auth;

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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'firstName' => 'required|string|min:3|max:50',
            'lastName' => 'required|string|min:3|max:50',
            'email' => 'required|email|min:6|max:191|unique:users,email',
            'password' => 'required|min:6|max:191'
        ];
    }
}
