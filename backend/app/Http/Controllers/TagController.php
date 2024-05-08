<?php
namespace App\Http\Controllers;
use App\Models\Tag;
use Illuminate\Http\Request;
class TagController extends Controller {
    public function index(Request $request)
    {
        $tags = Tag::all();
        return view('tags.index', compact('tags'));
    }
    public function create(Request $request)
    {
        return view('tags.create');
    }
    public function store(Request $request)
    {
        // сохраняются данные в модель и редирект на страницу со всеми постами
        $request->validate([
            'title' => 'required',
        ]);
        $tag               = new Tag();
        $tag->title        = $request->input('title');
        $tag->save();

        //return redirect()->back();
        return redirect()->route('tag.index');

    }
    public function delete($id) {
        // удаление записи
        $tag = Tag::findOrFail($id);
        $tag->delete();
        return redirect()->back();
    }
    public function edit($id) {
        // по ссылке из index мы переходим с данными о посте в id
        // далее ищем этот пост и передаем его на страницу edit с постом по id
        $tag = Tag::find($id); // Получаем данные поста по переданному идентификатору
        return view('tags.edit', compact('tag')); // Передаем данные поста на страницу редактирования
    }
    public function update(Request $request, $id) {
        // изменение записи
        // со страницы edit на контроллер отправляется id поста и его данные
        // записываем все данные и переходим на главную страницу
        $request->validate([
            'title' => 'required',
        ]);
        $tag        = Tag::find($id);
        $tag->title = $request->input('title');
        $tag->save();

        return redirect()->route('tag.index');
    }
    // API
    public function TagAllToJSON(Request $request) {
        $tags = Tag::all();
        return response()->json($tags, 200);
    }

    // для конкретного поста
    public function show($id)
    {
        $tag = Tag::find($id);

        if (!$tag) {
            return response()->json(['error' => 'Post not found'], 404);
        }

        return response()->json($tag, 200);
    }

}
