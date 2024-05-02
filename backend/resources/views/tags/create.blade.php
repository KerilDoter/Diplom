<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Создание тега</title>
</head>
<body>
<form action=" {{ route('tag.store') }}" method="post">
    @csrf
    <label for="title">
        Название тега
        <input type="text" name="title" id="title" value="">
    </label>

    <input type="submit" value="создать категорию">
</form>
</body>
</html>
