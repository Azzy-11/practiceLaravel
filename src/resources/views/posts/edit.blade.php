@extends('app')

@section('title', '投稿編集 | Meower')
@section('h1', '投稿編集')

@section('content')  
    <form action="{{ route('posts.update', $post) }}" method="POST">
        @csrf
        @method('PATCH')
        <div>
            <label for="title">タイトル</label>
            <input type="text" id="title" name="title" class="input-a" value="{{ old('title', $post->title) }}">
            @if($errors->has('title'))
            <span class="error">{{ $errors->first('title') }}</span>
            @endif 
        </div>
        <div>
            <label for="content">本文</label>
            <textarea id="content" name="content" class="input-a">{{ old('content', $post->content) }}</textarea>
            @if($errors->has('content'))
            <span class="error">{{ $errors->first('content') }}</span>
            @endif 
        </div>
        <button type="submit" class="button">更新</button>
    </form>
@endsection
