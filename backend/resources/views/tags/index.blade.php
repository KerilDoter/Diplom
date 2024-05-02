<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Тег</title>
</head>
<body>
<section class="tag">
    <a href="{{ route('tag.create')}}">Создать тег</a>
    @foreach($tags as $tag)
        <p>Название тега: {{ $tag->title }}</p>
        <!-- Кнопка для удаления записи -->
        <form action="{{ route('tag.delete', $tag->id) }}" method="post">
            @csrf
            @method('DELETE')
            <button type="submit">Удалить</button>
        </form>
        <a href="{{ route('tag.edit', $tag->id) }}">Изменить</a>
    @endforeach
    <hr>
</section>
</body>
</html>
