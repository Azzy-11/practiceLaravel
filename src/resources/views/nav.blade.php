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