@extends('app')

@section('title', '投稿詳細 | Meower')
@section('h1', '投稿詳細')

@section('content')  
    @if (session('flash_message'))
        <p>{{ session('flash_message') }}</p>
    @endif

    <article class="article">
        <h2>{{ $post->title }}</h2>
        <p>{{ $post->content }}</p>
        @if ($post->user_id === Auth::id())
            <a href="{{ route('posts.edit', $post) }}">編集</a>
            <form id="delete-form" action="{{ route('posts.destroy', $post) }}" method="POST" onsubmit="return confirm('本当に削除してもよろしいですか？');">
                @csrf
                @method('DELETE')
                <a href="" onclick="event.preventDefault(); document.querySelector('#delete-form').submit();">削除</a>
            </form>
        @endif
    </article>
@endsection
