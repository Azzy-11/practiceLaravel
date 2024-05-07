<?php

namespace App\Rules;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Post;

use Illuminate\Contracts\Validation\Rule;

class IsSelfPost implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        /**
         * @var User $user
         */
        $user = Auth::user()->id;
        $post = Post::query()->where('id', $value)->first();
        if ($post->user_id !== $user) {
            abort('403');
        }

        return true;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'アクセス権限がありません。';
    }
}
