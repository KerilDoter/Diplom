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
        <label for="cardName">
            Название поста
            <input type="text" name="cardName" id="cardName" value="{{ $post->cardName }}">
        </label>
        <label for="cardImage">
            Изображение
            <input type="text" name="cardImage" id="cardImage" value="{{ $post->cardImage }}">
        </label>
        <label for="cardDescription">
            Дополнительная информация
            <input type="text" name="cardDescription" id="cardDescription" value="{{ $post->cardDescription }}">
        </label>
        <input type="submit" value="Изменить">
    </form>
</body>
</html>
