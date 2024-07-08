<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Создание статуса</title>
    <!-- Подключение стилей Bootstrap -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<section class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <form action="{{ route('status.store') }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="title">Название статуса</label>
                    <input type="text" name="title" id="title" class="form-control" value="">
                </div>
                <button type="submit" class="btn btn-primary">Создать статус</button>
            </form>
        </div>
    </div>
</section>
<!-- Подключение скриптов Bootstrap -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
