<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>新規投稿 | Meower</title>
    <link rel="stylesheet" href="{{ asset('/css/style.css') }}">
</head>

<body>
    <main>
        <div id="form-main">
            <nav class="nav">
                <a href="{{ route('posts.index') }}" class="nav-top">投稿アプリ</a>
                <ul class="nav-list">
                    <li class="nav-item">
                        <a href="{{ route('posts.create') }}">新規投稿</a>
                    </li>
                    <li class="nav-item">
                        <form id="logout-form" action="{{ route('user.logout') }}" method="POST">
                            @csrf
                            <a href="" onclick="event.preventDefault(); document.querySelector('#logout-form').submit();">ログアウト</a>
                        </form>
                    </li>
                </ul>
            </nav>

            <div id="form-index">

                <a href="{{ route('posts.index') }}">&lt; 戻る</a>
                <h1>新規投稿</h1>
    
                <form action="{{ route('posts.store') }}" method="POST">
                    @csrf
                    <div>
                        <label for="title">タイトル</label>
                        <input type="text" id="title" name="title" class="input-a">
                        @if($errors->has('title'))
                        <span class="error">{{ $errors->first('title') }}</span>
                        @endif 
                    </div>
                    <div>
                        <label for="content">本文</label>
                        <textarea id="content" name="content" class="input-a"></textarea>
                        @if($errors->has('content'))
                        <span class="error">{{ $errors->first('content') }}</span>
                        @endif 
                    </div>
                    <button type="submit" class="button">投稿</button>
                </form>
            </div>

    </main>
</body>

</html>
