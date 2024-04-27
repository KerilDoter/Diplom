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
        <form action=" {{ route('todo.store') }}" method="post">
            @csrf
            <label for="cardName">
                Название поста
                <input type="text" name="cardName" id="cardName">
            </label>
            <label for="cardImage">
                Изображение
                <input type="text" name="cardImage" id="cardImage">
            </label>
            <label for="cardDescription">
                Дополнительная информация
                <input type="text" name="cardDescription" id="cardDescription">
            </label>
            <input type="submit">
        </form>

        <p>Все посты</p>
        @foreach($posts as $post)
            <p>{{ $post->cardName }}</p>
            <p>{{ $post->cardImage }}</p>
            <p>{{ $post->cardDescription }}</p>
            <!-- Кнопка для удаления записи -->
            <form action="{{ route('post.delete', $post->id) }}" method="post">
                @csrf
                @method('DELETE')
                <button type="submit">Удалить</button>
            </form>
            <a href="{{ route('post.edit', $post->id) }}">Изменить</a>
        @endforeach
    </section>
</body>
</html>
