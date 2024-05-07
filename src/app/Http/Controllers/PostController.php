<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Post;
use App\Models\User;
use App\Http\Requests\Post\StoreRequest;
use App\Http\Requests\Post\EditRequest;
use App\Http\Requests\Post\UpdateRequest;

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
        Post::query()->create([
            'user_id' => $user->id,
            'title' => $request->getPostTitle(),
            'content' => $request->getPostContent(),
        ]);

        return redirect()->route('posts.index')->with('flash_message', '投稿が完了しました。');
    }

    public function edit(EditRequest $request)
    {
        $post = Post::query()->where('id', $request->getPostId())->first();
        return view('posts.edit', compact('post'));
    }

    public function update(UpdateRequest $request,)
    {
        $post = Post::query()->where('id', $request->getPostId())->first();
        $post->update([
            'title' => $request->getPostTitle(),
            'content' => $request->getPostContent(),
        ]);

        return redirect()->route('posts.show', $post)->with('flash_message', '投稿を編集しました。');
    }

}
