<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<h1>Изменение статуса</h1>
<form action="{{ route('status.update', $status->id) }}" method="post">
    @csrf
    @method('PUT')
    <label for="title">
        Название статуса
        <input type="text" name="title" id="title" value="{{ $status->title }}">
    </label>
    <input type="submit" value="Изменить">
</form>
</body>
</html>
