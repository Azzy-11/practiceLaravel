<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Meower | registration</title>
  <link rel="stylesheet" href="{{ asset('/css/style.css') }}">
</head>
<body>
  <div id="form-main">
    <div id="form-wide">
      <h1 class="title">会員登録</h1>
      <form action="" method="post" class="form" id="form2">
        @csrf
        
        <div class="input-div">
          <label for="name" class="label-a">ユーザ名</label>
          <input name="user_name" type="text" class="input-a" id="user_name" />
          @if($errors->has('user_name'))
            <span class="error">{{ $errors->first('user_name') }}</span>
          @endif 
        </div>

        <div class="input-div">
          <label for="email" class="label-a">メールアドレス</label>
          <input name="email" type="email" class="input-a" id="email" />
          @if($errors->has('email'))
          <span class="error">{{ $errors->first('email') }}</span>
          @endif 
        </div>
        
        <div class="input-div">
          <label for="password" class="label-a">パスワード</label>
          <input name="password" type="password" class="input-a" id="password" />
          @if($errors->has('password'))
          <span class="error">{{ $errors->first('password') }}</span>
          @endif
          <p class="caution">パスワードは8~56文字で、少なくとも大文字小文字数字記号（!?-_）をそれぞれ1つ以上含む必要があります。</p>
        </div>
        
        <div class="submit-short mt3">
          <input type="submit" value="登録" class="button-blue short"/>
          <div class="ease short"></div>
        </div>

      </form>
    </div>
  </div>
</body>
</html>