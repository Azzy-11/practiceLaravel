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
        @include('nav')

        <div id="form-index">

          <a href="{{ route('posts.index') }}">&lt; 戻る</a>
          <h1>@yield('h1')</h1>
          @yield('content')
        </div>
    </div>
</body>
</html>