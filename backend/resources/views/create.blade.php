<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Создание поста</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <div class="row justify-content-center mt-5">
        <div class="col-md-8">
            @if(Auth::user())
                <p>Вы вошли как: {{ Auth::user()->email }}</p>
            @endif
            <h2 class="mb-4">Создание поста</h2>
            <form action="{{ route('post.store') }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="title">Название поста</label>
                    <input type="text" name="title" id="title" class="form-control" value="">
                </div>

                <div class="form-group">
                    <label for="description">Краткая информация</label>
                    <textarea name="description" id="description" class="form-control"></textarea>
                </div>

                <div class="form-group">
                    <label for="content">Содержание</label>
                    <textarea name="content" id="content" class="form-control" rows="5"></textarea>
                </div>

                <div class="form-group">
                    <label for="category_id">Выберите категорию</label>
                    <select name="category_id" id="category_id" class="form-control">
                        @foreach($categories as $key => $value)
                            <option value="{{ $key }}">{{ $value }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="attachment_id">Добавьте дополнительные файлы</label>
                    <input type="text" name="attachment_id" id="attachment_id" class="form-control" value="">
                </div>

                <button type="submit" class="btn btn-primary">Создать</button>
            </form>
        </div>
    </div>
</div>
</body>
</html>
