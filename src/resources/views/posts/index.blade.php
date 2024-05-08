@extends('app')

@section('title', '投稿一覧 | Meower')
@section('h1', '投稿一覧')

@section('content')          
    @if (session('flash_message'))
        <p>{{ session('flash_message') }}</p>
    @endif

    @if($posts->isNotEmpty())
        @foreach($posts as $post)
            <article class="article">
                <h2 class="h2">{{ $post->title }}</h2>
                <p>{{ $post->content }}</p>
                <a href="{{ route('posts.show', $post) }}">詳細</a>
            </article>
        @endforeach
    @else
        <p>投稿はありません。</p>
    @endif
@endsection