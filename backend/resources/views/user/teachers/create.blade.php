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
<form action=" {{ route('register.storeTeacher') }}" method="post">
    @csrf
    <label for="email">Почта:</label>
    <input type="email" id="email" name="email" required><br><br>

    <label for="password">Пароль:</label>
    <input type="password" id="password" name="password" required><br><br>

    <label for="surname">Фамилия:</label>
    <input type="surname" id="surname" name="surname" required><br><br>

    <label for="name">Имя:</label>
    <input type="name" id="name" name="name" required><br><br>

    <label for="patronymic">Отчество:</label>
    <input type="patronymic" id="patronymic" name="patronymic" required><br><br>

    <label for="department">Кафедра:</label>
    <input type="department" id="department" name="department" required><br><br>
    <label for="position">Должность:</label>
    <input type="position" id="position" name="position" required><br><br>
    <input type="submit" value="Зарегистрироваться">
</form>
</body>
</html>
