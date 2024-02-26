<?php
namespace App\Http\Controllers;
use App\Models\Post;
use Illuminate\Http\Request;
class PostController extends Controller {
    public function index(Request $request) {
        //$card = new Post();
        //$card = Post::all();
        //return view('index', compact('card'));

        $posts = Post::all();
        return response()->json($posts, 200);
    }
    public function create(Request $request)
    {
        // показывается форма для записи
        return view('create');
    }
    public function storeAll(Request $request)
    {
        // сохраняются данные в модель и редирект на страницу со всеми постами

        $card                  = new Post();
        $card->cardName        = $request->input('cardName');
        $card->cardImage       = $request->input('cardImage');
        $card->cardDescription = $request->input('cardDescription');
        $card->save();
        $request->validate([
            'cardName' => 'required',
            // Добавьте другие правила валидации
        ]);
        return redirect()->route('index');

    }
    public function store(Request $request)
    {
        $request->validate([
            'cardName' => 'required',
            // Добавьте другие правила валидации, если необходимо
        ]);

        $card           = new Post();
        $card->cardName = $request->input('cardName');
        // Добавьте другие поля, если они присутствуют
        $card->save();
        return response()->json(['message' => 'Данные не сохранены'], 200);
    }

    // контроллер, который показывает
    public function show($id)
    {
        $post = Post::find($id);

        if (!$post) {
            return response()->json(['error' => 'Пост не найден'], 404);
        }

        return response()->json($post, 200);
    }
}

