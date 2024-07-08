<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Категории</title>
    <!-- Подключение стилей Bootstrap -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<section class="category text-center">
    <a href="{{ route('category.create')}}" class="btn btn-primary mb-2">Создать категорию</a>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">Название категории</th>
            <th scope="col">Действия</th>
        </tr>
        </thead>
        <tbody>
        @foreach($categories as $category)
            <tr>
                <td class="text-center">{{ $category->title }}</td>
                <td class="d-flex justify-content-center">
                    <!-- Кнопка для удаления записи -->
                    <form action="{{ route('category.delete', $category->id) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Удалить</button>
                    </form>
                    <a href="{{ route('category.edit', $category->id) }}" class="btn btn-warning btn-sm ml-1">Изменить</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</section>
<!-- Подключение скриптов Bootstrap -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
