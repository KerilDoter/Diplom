<?php
namespace App\Http\Controllers;
use App\Models\Category;
use Illuminate\Http\Request;
class CategoryController extends Controller {
    public function categoryIndex(Request $request)
    {
        // страница с созданием категории
        return view('categories.create');
    }
    /*
    public function all(Request $request) {
        // показ всех записей
        $categories= Category::all();
        return view('index', ['$categories' => $categories]);
    }
    */
    public function store(Request $request)
    {
        // сохраняются данные в модель и редирект на страницу со всеми постами
        $category               = new Category();
        //$card->cardName        = $request->input('cardName');
        //$card->cardImage       = $request->input('cardImage');
        //$card->cardDescription = $request->input('cardDescription');
        // для старой миграции

        $category->title         = $request->input('title');
        $category->save();
        $request->validate([
            'title' => 'required',
        ]);
        //return redirect()->back();
        return redirect()->route('post.all');

    }
    public function delete($id) {
        // удаление записи
        $category = Category::findOrFail($id);
        $category->delete();
        return redirect()->back();
    }
    public function edit($id) {
        // по ссылке из index мы переходим с данными о посте в id
        // далее ищем этот пост и передаем его на страницу edit с постом по id
        $category = Category::find($id); // Получаем данные поста по переданному идентификатору
        return view('categories.edit', compact('category')); // Передаем данные поста на страницу редактирования
    }
    public function update(Request $request, $id) {
        // изменение записи
        // со страницы edit на контроллер отправляется id поста и его данные
        // записываем все данные и переходим на главную страницу

        $category                  = Category::find($id);
        //$post->cardName        = $request->input('cardName');
        //$post->cardImage       = $request->input('cardImage');
        //$post->cardDescription = $request->input('cardDescription');
        // для старой миграции

        $category->title         = $request->input('title');
        $category->save();
        $request->validate([
            'title' => 'required',
        ]);
        return redirect()->route('post.all');
    }
    // API
    public function CategoryAllToJSON(Request $request) {
        //$card = new Post();
        //$card = Post::all();
        //return view('index', compact('card'));

        $categories = Category::all();
        return response()->json($categories, 200);
    }

    // для конкретного поста
    public function show($id)
    {
        $category = Category::find($id);

        if (!$category) {
            return response()->json(['error' => 'Post not found'], 404);
        }

        return response()->json($category, 200);
    }

}
