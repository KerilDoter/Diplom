<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Все пользователи</title>
</head>
<body>
<section class="users">
    @foreach($users as $user)
        <p>email: {{ $user->email }}</p>
        <a href="{{ route('student.lk', $user->id) }}">Личный кабинет пользователя</a>
    @endforeach
    <hr>
</section>
</body>
</html>
