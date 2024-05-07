<?php

namespace App\Http\Requests\Post;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\IsSelfPost;

class UpdateRequest extends FormRequest
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
            'title' => [
                'required',
                'string',
                new IsSelfPost(),
            ]
        ];

        $validate += [
            'content' => [
                'required',
                'string',
            ]
        ];

        return $validate;
    }

    public function attributes(): array
    {
        return [
            'title' => 'タイトル',
            'content' => '投稿内容',
        ];
    }

    public function getPostId() : int 
    {
        return (int)$this['id'];
    }

    public function getPostTitle(): string
    {
        return $this['title'];
    }

    public function getPostContent(): string
    {
        return $this['content'];
    }
}
