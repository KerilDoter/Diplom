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
    public function store(Request $request)
    {
        // сохраняются данные в модель и редирект на страницу со всеми постами

        $card                  = new Post();
        $card->cardName        = $request->input('cardName');
        $card->cardImage       = $request->input('cardImage');
        $card->cardDescription = $request->input('cardDescription');
        $card->save();
        $request->validate([
            'cardName' => 'required',
        ]);
        return redirect()->route('index');

    }
    public function storeAll(Request $request)
    {
        $request->validate([
            'cardName' => 'required',

        ]);

        $card           = new Post();
        $card->cardName = $request->input('cardName');
        // Добавьте другие поля, если они присутствуют
        $card->save();
        return response()->json(['message' => 'Data saved successfully'], 200);
    }

    // для конкретного поста
    public function show($id)
    {
        $post = Post::find($id);

        if (!$post) {
            return response()->json(['error' => 'Post not found'], 404);
        }

        return response()->json($post, 200);
    }

    // количество постов
    public function getPostCount()
    {
        $posts = Post::count();

        if($posts=== 0) {
            return response()->json(['posts' => 0]);
        }

        return response()->json(['posts' => $posts]);
    }

    // количество постов со статусом на модерации
    public function getPostsInModeration()
    {
        $postsInModerationCount = Post::where('status', 'на модерации')->count();

        return response()->json(['posts_in_moderation' => $postsInModerationCount]);
    }

    // количество постов со статусом готово
    public function getReadyPosts()
    {
        $readyPostsCount = Post::where('status', 'готово')->count();

        return response()->json(['ready_posts' => $readyPostsCount]);
    }
}

