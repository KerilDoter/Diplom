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
<h1>Изменение категории</h1>
<form action="{{ route('category.update', $category->id) }}" method="post">
    @csrf
    @method('PUT')
    <label for="title">
        Название поста
        <input type="text" name="title" id="title" value="{{ $category->title }}">
    </label>
    <input type="submit" value="Изменить">
</form>
</body>
</html>
