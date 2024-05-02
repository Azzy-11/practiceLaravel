<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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
        $validate = [];

        $validate += [
            'email' => [
                'required',
                'string',
                'email',
            ]
        ];

        $validate += [
            'password' => [
                    'required',
                    'string',
                    'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[!?-_])[A-Za-z\d!?-_]{8,56}$/',
                ]
        ];

        return $validate;
    }

    public function getEmail(): string
    {
        return $this['email'];
    }

    public function getPassword(): string
    {
        return $this['password'];
    }
    
}
