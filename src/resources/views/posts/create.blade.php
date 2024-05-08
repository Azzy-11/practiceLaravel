
@extends('app')

@section('title', '新規投稿 | Meower')
@section('h1', '新規投稿')

@section('content')  
    <form action="{{ route('posts.store') }}" method="POST">
        @csrf
        <div>
            <label for="title">タイトル</label>
            <input type="text" id="title" name="title" class="input-a" value="{{ old('title') }}">
            @if($errors->has('title'))
            <span class="error">{{ $errors->first('title') }}</span>
            @endif 
        </div>
        <div>
            <label for="content">本文</label>
            <textarea id="content" name="content" class="input-a">{{ old('content') }}</textarea>
            @if($errors->has('content'))
            <span class="error">{{ $errors->first('content') }}</span>
            @endif 
        </div>
        <button type="submit" class="button">投稿</button>
    </form>
@endsection