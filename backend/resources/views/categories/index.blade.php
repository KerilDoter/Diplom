<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Категории</title>
</head>
<body>
<section class="category">
    <a href="{{ route('category.create')}}">Создать категорию</a>
    @foreach($categories as $category)
        <p>Название категории: {{ $category->title }}</p>
        <!-- Кнопка для удаления записи -->
        <form action="{{ route('category.delete', $category->id) }}" method="post">
            @csrf
            @method('DELETE')
            <button type="submit">Удалить</button>
        </form>
        <a href="{{ route('category.edit', $category->id) }}">Изменить</a>
    @endforeach
    <hr>
</section>
</body>
</html>
