<?php
declare(strict_types=1);

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class VerifyRequest extends FormRequest
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
    public function rules(): array
    {

        $validate = [];

        $validate += [
            'verify_token' => [
                'required',
                'string',
            ]
        ];

        return $validate;

    }

    public function getVerifyToken(): string
    {
        return $this['verify_token'];
    }

}
