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
        <form action=" {{ route('post.store') }}" method="post">
            @csrf
            <label for="title">
                Название поста
                <input type="text" name="title" id="title" value="">
            </label>

            <label for="description">
                Краткая информация
                <input type="text" name="description" id="description" value="">
            </label>

            <label for="content">
                Содержание
                <input type="text" name="content" id="content" value="">
            </label>

            <label for="category_id">
                Выберите категорию
                <input type="text" name="category_id" id="category_id" value="">
            </label>

            <label for="attachment_id">
                Добавьте дополнительные файлы
                <input type="text" name="attachment_id" id="attachment_id" value="">
            </label>

            <label for="status_id">
                Выберите статус поста
                <input type="text" name="status_id" id="status_id" value="">
            </label>
            <input type="submit" value="создать">
        </form>
        @foreach($posts as $post)
            <p>Название поста: {{ $post->title }}</p>
            <p>Краткое описание поста: {{ $post->description }}</p>
            <p>Основное содержание: {{ $post->content }}</p>
            <p>Категория: {{ $post->category_id }}</p>
            <p>Вложения: {{ $post->attachment_id }}</p>
            <p>Статус: {{ $post->status_id }}</p>
            <!-- Кнопка для удаления записи -->
            <form action="{{ route('post.delete', $post->id) }}" method="post">
                @csrf
                @method('DELETE')
                <button type="submit">Удалить</button>
            </form>
            <a href="{{ route('post.edit', $post->id) }}">Изменить</a>
        @endforeach

<!--


-->
    </section>
</body>
</html>
