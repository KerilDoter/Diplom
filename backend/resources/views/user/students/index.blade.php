<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Личный кабинет студента</title>
</head>
<body>
<h1>Личный кабинет</h1>
<p>Фамилия  {{$user->surname}}</p>
<p>Имя  {{$user->name}}</p>
<p>Отчество  {{$user->patronymic}}</p>
<p>Группа  {{$user->group}}</p>
<p>Номер телефона  {{$user->phone}}</p>
<p>Рабочий номер телефона  {{$user->work_phone}}</p>
<p>Почта  {{$user->email}}</p>
<p>Telegram  {{$user->telegram}}</p>
<p>Вконтакте  {{$user->vk}}</p>
<p>О себе  {{$user->about}}</p>
<p>Интересы  {{$user->skills_id}}</p>
<a href="{{ route('student.edit', $user->id) }}">Изменить</a>
</body>
</html>
