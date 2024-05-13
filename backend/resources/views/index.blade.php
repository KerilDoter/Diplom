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
<style>
    /* Table container */
    table {
        width: 100%;
        display: table;
        border-collapse: collapse;
    }

    /* Table row */
    tr{
        display: table-row;
    }



    /* Table cell */
    td {
        display: table-cell;
        padding: 0.75rem;
        border-bottom: 1px solid #edf2f7;
    }
</style>
    <h1>Админка</h1>
    <section class="post">
        @if(Auth::user())
            {{ Auth::user()->name }}
        @endif


        @if(!Auth::user())
            <a href=" {{route('user.register')}}">Регистрация</a>
            <a href=" {{route('login.create')}}">Авторизация</a>
        @endif

        @if(Auth::user())
            <a href=" {{route('logout')}}">Выйти из профиля</a>

        @endif

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
                    <td>
                        @if(Auth::id() == $post->user_id && $post->user_id != null)
                            <form action="{{ route('post.delete', $post->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit">Удалить</button>
                            </form>
                        @endif

                    </td>
                    <td>
                        @if(Auth::id() == $post->user_id && $post->user_id != null)
                            <a href="{{ route('post.edit', $post->id) }}">Изменить</a>
                        @endif

                    </td>
                </tr>
            @endforeach
        </table>
        <hr>
    </section>
</body>
</html>
