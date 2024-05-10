<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Post;
use App\Models\User;
use App\Http\Requests\Post\StoreRequest;
use App\Http\Requests\Post\UpdateRequest;
use Illuminate\Support\Str;

class PostController extends Controller
{
    Public function index()
    {
        /**
         * @var User $user
         */
        $user = Auth::user();
        $posts = $user->posts()->orderBy('created_at', 'desc')->get();

        return view('posts.index', compact('posts'));
    }

    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(StoreRequest $request)
    {
        /**
         * @var User $user
         */
        $user = Auth::user();
        $auth_key = Str::random(16);
        Post::query()->create([
            'user_id' => $user->id,
            'auth_key' => $auth_key,
            'title' => $request->getPostTitle(),
            'content' => $request->getPostContent(),
        ]);

        return redirect()->route('posts.index')->with('flash_message', '投稿が完了しました。');
    }

    public function edit(Post $post)
    {
        $this->authorize('edit', $post);

        return view('posts.edit', compact('post'));
    }

    public function update(UpdateRequest $request, Post $post)
    {
        $this->authorize('update', $post);

        $post->update([
            'title' => $request->getPostTitle(),
            'content' => $request->getPostContent(),
        ]);

        return redirect()->route('posts.show', $post)->with('flash_message', '投稿を編集しました。');
    }

    public function destroy(Post $post)
    {
        $this->authorize('delete', $post);

        $post->delete();

        return redirect()->route('posts.index')->with('flash_message', '投稿を削除しました。');
    }

}
