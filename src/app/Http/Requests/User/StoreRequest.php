<?php
declare(strict_types=1);

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

final class StoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        $validate = [];

        $validate += [
            'user_name' => [
                'required',
                'string',
                'regex:/^[0-9a-zA-Z!?-_]{4,16}$/',
            ]
        ];

        $validate += [
            'email' => [
                'required',
                'email',
                'string',
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

    public function attributes(): array
    {
        return [
            'user_name' => 'ユーザ名',
            'email' => 'メールアドレス',
            'password' => 'パスワード',
        ];
    }

    public function getUserName(): string
    {
        return $this['user_name'];
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
