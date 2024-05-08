<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>投稿詳細 | Meower</title>
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
            <h1>投稿詳細</h1>
            @if (session('flash_message'))
                <p>{{ session('flash_message') }}</p>
            @endif

            <article class="article">
                <h2>{{ $post->title }}</h2>
                <p>{{ $post->content }}</p>
                @if ($post->user_id === Auth::id())
                    <a href="{{ route('posts.edit', $post) }}">編集</a>
                @endif
            </article>
    </main>
</body>

</html>
