<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <title>Авторизация</title>
</head>
<body>
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header text-center">
                    <h3>Авторизация</h3>
                </div>
                <div class="card-body">
                    <form action=" {{ route('login') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="email">Email адрес</label>
                            <input type="email" id="email" name="email" required placeholder="Введите email">
                        </div>
                        <div class="form-group">
                            <label for="password">Пароль</label>
                            <input type="password" id="password" name="password" required placeholder="Введите пароль">
                        </div>
                        <button type="submit" class="btn btn-primary btn-block">Войти</button>
                    </form>
                    <p>Нет профиля?</p>
                    <a href=" {{route('user.register')}}" class="btn btn-primary btn-block">Регистрация</a>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
