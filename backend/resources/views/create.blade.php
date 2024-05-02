<form action=" {{ route('post.store') }}" method="post">
    @csrf
    <label for="title">
        Название поста
        <input type="text" name="title" id="title" value="">
    </label>

    <label for="description">
        Краткая информация
        <input type="text" name="description" id="description" value="">
    </label>

    <label for="content">
        Содержание
        <input type="text" name="content" id="content" value="">
    </label>
    <!--
                <label for="category_id">
                    Выберите категорию
                    <input type="text" name="category_id" id="category_id" value="">
                </label>
    -->
    <label for="category_id">Выберите категорию</label>
    <select name="category_id" id="category_id">
        @foreach($categories as $key => $value)
            <option value=" {{ $key }}"> {{ $value }} </option>
        @endforeach

    </select>

    <label for="attachment_id">
        Добавьте дополнительные файлы
        <input type="text" name="attachment_id" id="attachment_id" value="">
    </label>

    <!--        <label for="status_id">
                    Выберите статус поста
                    <input type="text" name="status_id" id="status_id" value="">
                </label>
    -->
    <label for="status_id">Выберите статус поста</label>
    <select name="status_id" id="status_id">
        @foreach($statuses as $key => $value)
            <option value=" {{ $key }}"> {{ $value }}</option>
        @endforeach
    </select>
    <input type="submit" value="создать">
</form>
