<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Index</title>
</head>
<body>
    <h1>Админка</h1>
    <section class="post">
        <h2>Посты</h2>
        <p>Создание поста</p>
        <p>Все посты</p>
        <a href=" {{route('post.create')}}">Создать пост</a>
        @foreach($posts as $post)
            <p>Название поста: {{ $post->title }}</p>
            <p>Краткое описание поста: {{ $post->description }}</p>
            <p>Основное содержание: {{ $post->content }}</p>
            <p>Категория: {{ $post->category->title }}</p>
            <p>Вложения: {{ $post->attachment_id }}</p>
            <p>Статус: {{ $post->status->title}}</p>
            <!-- Кнопка для удаления записи -->
            <form action="{{ route('post.delete', $post->id) }}" method="post">
                @csrf
                @method('DELETE')
                <button type="submit">Удалить</button>
            </form>
            <a href="{{ route('post.edit', $post->id) }}">Изменить</a>
        @endforeach
        <hr>
    </section>
</body>
</html>
