<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title')</title>
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
          <h1>@yield('h1')</h1>
          @yield('content')
        </div>
    </div>
</body>
</html>