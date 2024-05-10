<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use App\Models\Post;

class IsSelfPost implements Rule
{
    protected $auth_key;
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct(string $auth_key)
    {
        $this->auth_key = $auth_key;
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
        $post = Post::query()->where('id', $value)->first();
        if ($post->auth_key !== $this->auth_key) {
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
        return 'The validation error message.';
    }
}
