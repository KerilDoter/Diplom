<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <title>Панель администратора</title>
</head>
<body>
    <section class="post">
        <div class="container mt-5">
            <div class="d-flex justify-content-center align-items-center">
                <div class="text-center">
                    @if(Auth::user())
                        {{ Auth::user()->name }}
                    @endif
                    @if(!Auth::user())
                        <a href=" {{route('user.register')}}" class="btn btn-primary">Регистрация</a>
                        <a href=" {{route('login.create')}}" class="btn btn-primary">Авторизация</a>
                    @endif
                    @if(Auth::user())
                        <a href=" {{route('logout')}}" class="btn btn-primary">Выйти из профиля</a>

                    @endif
                    <a href=" {{route('user.index')}}" class="btn btn-primary">Все пользователи</a>
                    <h2>Посты</h2>
                    <a href=" {{route('category.index')}}" class="btn btn-primary">Категории</a>
                    <a href=" {{route('status.index')}}" class="btn btn-primary">Статусы</a>
                    <a href=" {{route('tag.index')}}" class="btn btn-primary">Теги</a>
                    @if( Auth::user())
                        <a href=" {{route('post.create')}}" class="btn btn-primary">Создать пост</a>
                    @else
                        Вы не зарегистрированы
                    @endif
                    <p>Все посты</p>
                </div>
            </div>
        </div>
            <div class="container mt-5">
                <table class="table table-striped table-bordered table-hover">
                    <tr>
                        <th >Автор</th>
                        <th >Название поста</th>
                        <th >Краткое описание поста</th>
                        <th >Основное содержание</th>
                        <th >Категория</th>

                        <th >Статус</th>
                        <th >Дата создания</th>
                        <th ></th>
                        <th ></th>
                    </tr>
                    @foreach($posts as $post)
                        <tr>
                            <td>{{ $post->user_id }}</td>
                            <td>{{ $post->title }}</td>
                            <td>{{ $post->description }}</td>
                            <td>{{ $post->content }}</td>
                            <td>{{ $post->category->title }}</td>

                            <td>{{ $post->status->title }}</td>
                            <td>{{ $post->created_at }}</td>
                            <td>
                                @if(Auth::id() == $post->user_id && $post->user_id != null || Auth::user()->is_admin)
                                    <form action="{{ route('post.delete', $post->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit">Удалить</button>
                                    </form>
                                @endif
                            </td>
                            <td>
                                @if(Auth::id() == $post->user_id && $post->user_id != null || (Auth::user() && Auth::user()->rule_id == 1 || Auth::user()->is_admin))
                                    <a href="{{ route('post.edit', $post->id) }}">Изменить</a>
                                @endif
                                @if($post->ismoderated)
                                    Куратор
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        <hr>
    </section>
</body>
</html>
