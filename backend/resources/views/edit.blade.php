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
    <h1>Изменение поста</h1>
    <form action="{{ route('post.update', $post->id) }}" method="post">
        @csrf
        @method('PUT')
        <label for="title">
            Название поста
            <input type="text" name="title" id="title" value="{{ $post->title }}">
        </label>

        <label for="description">
            Краткая информация
            <input type="text" name="description" id="description" value="{{ $post->description }}">
        </label>

        <label for="content">
            Содержание
            <input type="text" name="content" id="content" value="{{ $post->content }}">
        </label>

        <label for="category_id">
            Выберите категорию
            <input type="text" name="category_id" id="category_id" value="{{ $post->category_id }}">
        </label>
        <label for="attachment_id">
            Добавьте дополнительные файлы
            <input type="text" name="attachment_id" id="attachment_id" value="{{ $post->attachment_id }}">
        </label>

        <label for="status_id">
            Выберите статус поста
            <input type="text" name="status_id" id="status_id" value="{{ $post->status_id }}">
        </label>
        <input type="submit" value="Изменить">
    </form>
</body>
</html>
