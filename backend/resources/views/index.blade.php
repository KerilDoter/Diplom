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
        @if(Auth::user())
            {{ Auth::user()->name }}
        @endif

        <a href=" {{route('user.register')}}">Страница с регистрацией</a>
        <a href=" {{route('user.index')}}">Все пользователи</a>
        <h2>Посты</h2>
        <p>Все посты</p>
        <a href=" {{route('category.index')}}">Категории</a>
        <a href=" {{route('status.index')}}">Статусы</a>
        <a href=" {{route('tag.index')}}">Теги</a>
        @if( Auth::user())
            <a href=" {{route('post.create')}}">Создать пост</a>
        @else
            Вы не зарегистрированы
        @endif

        <table>
            <tr>
                <th>Автор</th>
                <th>Название поста</th>
                <th>Краткое описание поста</th>
                <th>Основное содержание</th>
                <th>Категория</th>
                <th>Вложения</th>
                <th>Статус</th>
                <th>Дата создания</th>
                <th></th>
                <th></th>
            </tr>
            @foreach($posts as $post)
                <tr>
                    <td>{{ $post->user_id }}</td>
                    <td>{{ $post->title }}</td>
                    <td>{{ $post->description }}</td>
                    <td>{{ $post->content }}</td>
                    <td>{{ $post->category->title }}</td>
                    <td>{{ $post->attachment_id }}</td>
                    <td>{{ $post->status->title }}</td>
                    <td>{{ $post->created_at }}</td>
                    <td><form action="{{ route('post.delete', $post->id) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Удалить</button>
                        </form></td>
                    <td><a href="{{ route('post.edit', $post->id) }}">Изменить</a></td>
                </tr>
            @endforeach
        </table>
        <hr>
    </section>
</body>
</html>
