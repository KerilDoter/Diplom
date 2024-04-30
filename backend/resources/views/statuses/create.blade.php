<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Создание статуса</title>
</head>
<body>
<form action=" {{ route('status.store') }}" method="post">
    @csrf
    <label for="title">
        Название статуса
        <input type="text" name="title" id="title" value="">
    </label>

    <input type="submit" value="создать статус">
</form>
</body>
</html>
