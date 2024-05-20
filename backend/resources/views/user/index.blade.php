<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <title>Все пользователи</title>
</head>
<body>
<div class="container mt-5">
    <h2 class="text-center mb-4">Список пользователей</h2>
    @if(Auth::user())
        <a href=" {{route('logout')}}" class="btn btn-primary">Выйти из профиля</a>
    @endif
    <a href=" {{route('post.index')}}" class="btn btn-primary">Главная страница</a>
    <table class="table table-striped table-bordered">
        <thead class="thead-dark">
        <tr>
            <th scope="col">ФИО</th>
            <th scope="col">Личный кабинет</th>
            <th scope="col">Статус</th>
            <th scope="col">Сделать администратором</th>
            <th scope="col">Удаление</th>
        </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
            @if($user->rule_id == 2 )
                <tr>
                    <td>{{ $user->surname . " " . $user->name . " " .$user->patronymic }}</td>
                    <td><a href="{{ route('student.lk', $user->id) }}">Личный кабинет  @if($user->is_admin) администратора @else студента  @endif</a></td>
                    @if($user->is_admin)
                        <td>Администатор</td>
                    @else
                        @if($user->rule_id == 2)
                            <td>Студент</td>
                        @endif
                    @endif
                    @if(!$user->is_admin && Auth::user()->is_admin == 1)
                        <td>
                            <form action="{{ route('user.makeAdmin', $user->id) }}" method="POST" class="d-inline">
                                @csrf
                                <button type="submit" class="btn btn-warning btn-sm">Сделать администратором</button>
                            </form>
                        </td>
                    @elseif (Auth::user()->is_admin && Auth::id() != $user->id)
                        <td>
                            <form action="{{ route('user.destroyAdmin', $user->id) }}" method="POST" class="d-inline">
                                @csrf
                                <button type="submit" class="btn btn-warning btn-sm">Убрать права администратора</button>
                            </form>
                        </td>
                    @else
                        <td>
                           Нет прав или вы уже администратор
                        </td>
                    @endif
                    <td>
                        @if(Auth::user()->is_admin && Auth::id() != $user->id)
                            <form action="{{ route('user.destroy', $user->id) }}" method="POST" onsubmit="return confirm('Вы уверены, что хотите удалить этого пользователя?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Удалить</button>
                            </form>
                        @elseif(Auth::id() == $user->id)
                            Это вы!
                        @else
                            Нет прав на удаление
                        @endif
                    </td>
                </tr>
            @elseif($user->rule_id == 1)
                <tr>
                    <td>{{ $user->surname . " " . $user->name . " " .$user->patronymic }}</td>
                    <td><a href="{{ route('teacher.lk', $user->id) }}"> Личный кабинет  @if($user->is_admin) администратора @else преподавателя  @endif</a></td>
                    @if($user->is_admin)
                        <td>Администатор</td>
                    @else
                        @if($user->rule_id == 1)
                            <td>Преподаватель</td>
                        @endif
                    @endif
                    @if(!$user->is_admin)
                        <td>
                            <form action="{{ route('user.makeAdmin', $user->id) }}" method="POST" class="d-inline">
                                @csrf
                                <button type="submit" class="btn btn-warning btn-sm">Сделать администратором</button>
                            </form>
                        </td>
                    @elseif (Auth::user()->is_admin && Auth::id() != $user->id)
                        <td>
                            <form action="{{ route('user.destroyAdmin', $user->id) }}" method="POST" class="d-inline">
                                @csrf
                                <button type="submit" class="btn btn-warning btn-sm">Убрать права администратора</button>
                            </form>
                        </td>
                    @else
                        <td>
                            Вы администратор
                        </td>
                    @endif

                    <td>
                        @if(Auth::user()->is_admin && Auth::id() != $user->id)
                            <form action="{{ route('user.destroy', $user->id) }}" method="POST" onsubmit="return confirm('Вы уверены, что хотите удалить этого пользователя?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Удалить</button>
                            </form>
                        @elseif(Auth::id() == $user->id)
                            Это вы!
                        @else
                            Нет прав на удаление
                        @endif

                    </td>
                </tr>
            @endif
        @endforeach
        </tbody>
    </table>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>





</body>
</html>
