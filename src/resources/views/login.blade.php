<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Meower | Login</title>
  <link rel="stylesheet" href="{{ asset('/css/style.css') }}">
</head>
<body>
  <div id="form-main">
    <div id="form-center">
      <form action="" method="post" class="form" id="form1">
        @csrf
        
        <p class="login-input">
          <input name="email" type="text" class="input-a" id="email" placeholder="メールアドレス" />
        </p>
        
        <p class="login-input">
          <input name="password" type="password" class="input-a" id="password" placeholder="パスワード" />
        </p>
        
        <div class="submit">
          <input type="submit" value="ログイン" class="button-blue long"/>
          <div class="ease"></div>
        </div>

      </form>
    </div>
  </div>
</body>
</html>