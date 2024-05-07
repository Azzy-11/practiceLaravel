<?php

namespace App\Http\Requests\Post;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\IsSelfPost;

class EditRequest extends FormRequest
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
            'id' => [
                new IsSelfPost(),
            ]
        ];

        return $validate;
    }

    public function getPostId() : int 
    {
        return (int)$this['id'];
    }
}
