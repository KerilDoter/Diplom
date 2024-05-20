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
        <label for="category_id">Выберите категорию</label>
        <select name="category_id" id="category_id">
            @foreach($categories as $key => $value)
                <option value=" {{ $key }}"> {{ $value }} </option>
            @endforeach
        </select>
        <label for="attachment_id">
            Добавьте дополнительные файлы
            <input type="text" name="attachment_id" id="attachment_id" value="{{ $post->attachment_id }}">
        </label>
        <label for="status_id">Выберите статус поста</label>
        <select name="status_id" id="status_id">
            @foreach($statuses as $key => $value)
                <option value=" {{ $key }}"> {{ $value }}</option>
            @endforeach
        </select>
        <input type="submit" value="Изменить">

    </form>
    @if($post->user_id != Auth::id() && Auth::user()->rule_id == 1)
        @if(!$post->is_moderated)
            <form action="{{ route('moderator.store', $post->id) }}" method="post">
                @csrf
                <input type="submit" value="Взять кураторство">
            </form>
        @else
            Куратор
        @endif
    @else
        У вас прав взять пост под кураторство
    @endif

</body>
</html>
