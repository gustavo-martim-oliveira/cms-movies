<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class ChangeProfileRequest extends FormRequest
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
            'name' => 'required|min:3|max:191',
            'last_name' => 'required|min:3|max:191'
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'Nome',
            'last_name' => 'Sobrenome'
        ];
    }
}
