<?php
namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Post;
use App\Models\Status;
use App\Models\Tag;
use Illuminate\Http\Request;
class PostController extends Controller {
    public function index(Request $request)
    {
        $posts      = Post::all();
        //$categories = Category::pluck('title', 'id')->all();
        //$statuses   = Status::pluck('title', 'id')->all();
        // показывается главная страница
        return view('index', compact('posts'));
    }
    public function create() {
        $posts      = Post::all();
        $categories = Category::pluck('title', 'id')->all();
        $statuses   = Status::pluck('title', 'id')->all();
        return view('create', compact('categories', 'statuses', 'posts'));
    }
    /*
    public function all(Request $request) {
        // показ всех записей
        $posts      = Post::all();
        //$categories = Category::all();
        $statuses   = Status::all();
        $tags       = Tag::all();
        return view('index',
            [
                'posts' => $posts,
                //'categories'=> $categories,
                'statuses' => $statuses,
                'tags' => $tags,
            ]);
    }
*/
    public function store(Request $request)
    {
        // сохраняются данные в модель и редирект на страницу со всеми постами
        $card                = new Post();
        $card->title         = $request->input('title');
        $card->description   = $request->input('description');
        $card->content       = $request->input('content');
        $card->category_id   = $request->input('category_id');
        $card->attachment_id = $request->input('attachment_id');
        $card->status_id     = $request->input('status_id');
        $card->save();
        $request->validate([
            'title' => 'required',
        ]);
        //return redirect()->back();
        return redirect()->route('post.index');

    }
    public function delete($id) {
        // удаление записи
        $post = Post::findOrFail($id);
        $post->delete();
        return redirect()->back();
    }
    public function edit($id) {
        // по ссылке из index мы переходим с данными о посте в id
        // далее ищем этот пост и передаем его на страницу edit с постом по id
        $post = Post::find($id); // Получаем данные поста по переданному идентификатору
        return view('edit', compact('post')); // Передаем данные поста на страницу редактирования
    }
    public function update(Request $request, $id) {
        // изменение записи
        // со страницы edit на контроллер отправляется id поста и его данные
        // записываем все данные и переходим на главную страницу

        $post                = Post::find($id);
        $post->title         = $request->input('title');
        $post->description   = $request->input('description');
        $post->content       = $request->input('content');
        $post->category_id   = $request->input('category_id');
        $post->attachment_id = $request->input('attachment_id');
        $post->status_id     = $request->input('status_id');
        $post->save();
        $request->validate([
            'title' => 'required',
        ]);
        return redirect()->route('post.index');
    }
    // API
    public function PostAllToJSON(Request $request) {
        //$card = new Post();
        //$card = Post::all();
        //return view('index', compact('card'));

        $posts = Post::all();
        return response()->json($posts, 200);
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

