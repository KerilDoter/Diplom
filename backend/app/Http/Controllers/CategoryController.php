<?php
namespace App\Http\Controllers;
use App\Models\Category;
use Illuminate\Http\Request;
class CategoryController extends Controller {
    public function index(Request $request)
    {
        $categories = Category::all();
        return view('categories.index', compact('categories'));
    }
    public function create(Request $request)
    {
        return view('categories.create');
    }
    public function store(Request $request)
    {
        $request->validate([
        'title' => 'required',
        ]);
        // сохраняются данные в модель и редирект на страницу со всеми постами
        $category        = new Category();
        $category->title = $request->input('title');
        $category->save();
        return redirect()->route('category.index');

    }
    public function delete($id) {
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
        $request->validate([
            'title' => 'required',
        ]);
        $category         = Category::find($id);
        $category->title  = $request->input('title');
        $category->save();
        return redirect()->route('category.index');
    }
    // API
    public function CategoryAllToJSON(Request $request) {
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
