<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Преподаватель</title>
</head>
<body>
<form action="{{ route('teacher.update', $user->id) }}" method="post">
    @csrf
    @method('PUT')
    <label for="email">Почта:</label>
    <input type="email" id="email" name="email" required value="{{ $user->email }}"><br><br>

    <label for="password">Пароль:</label>
    <input type="password" id="password" name="password" required><br><br>

    <label for="surname">Фамилия:</label>
    <input type="surname" id="surname" name="surname" required value="{{ $user->surname }}"><br><br>

    <label for="name">Имя:</label>
    <input type="name" id="name" name="name" required value="{{ $user->name }}"><br><br>

    <label for="patronymic">Отчество:</label>
    <input type="patronymic" id="patronymic" name="patronymic" required value="{{ $user->patronymic }}"><br><br>

    <label for="department">Факультет:</label>
    <input type="department" id="department" name="department" required value="{{ $user->department }}"><br><br>

    <label for="position">Должность:</label>
    <input type="position" id="position" name="position" required value="{{ $user->position }}"><br><br>

    <label for="phone">Номер телефона:</label>
    <input type="phone" id="phone" name="phone" required><br><br>

    <label for="work_phone">Рабочий номер телефона:</label>
    <input type="work_phone" id="work_phone" name="work_phone" required><br><br>

    <label for="telegram">Telegram:</label>
    <input type="telegram" id="telegram" name="telegram" required><br><br>

    <label for="vk">Вконтакте:</label>
    <input type="vk" id="vk" name="vk" required><br><br>

    <label for="about">О себе:</label>
    <input type="about" id="about" name="about" required><br><br>

    <label for="skills_id">Укажите интересы:</label>
    <input type="skills_id" id="group" name="skills_id" required><br><br>

    <input type="submit" value="Изменить информацию">
</form>
</body>
</html>
