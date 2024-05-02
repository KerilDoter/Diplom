<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Статусы</title>
</head>
<body>
<section class="status">
    <a href="{{ route('status.create')}}">Создать статус</a>
    @foreach($statuses as $status)
        <p>Название Статуса: {{ $status->title }}</p>
        <!-- Кнопка для удаления записи -->
        <form action="{{ route('status.delete', $status->id) }}" method="post">
            @csrf
            @method('DELETE')
            <button type="submit">Удалить</button>
        </form>
        <a href="{{ route('status.edit', $status->id) }}">Изменить</a>
    @endforeach
    <hr>
</section>
</body>
</html>

