<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Meower | Profile</title>
</head>
<body>
  {{$name}}でログインしてます

  <form action="{{route('user.logout')}}" method="post">
    @csrf
    <button>Logout</button>
  </form>
</body>
</html>