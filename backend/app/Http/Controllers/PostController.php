<?php
namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Post;
use App\Models\Status;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Firebase\JWT\JWT;
use Tymon\JWTAuth\Facades\JWTAuth;
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
    public function store(Request $request)
    {
        /* Первая версия
        $request->validate([
            'title' => 'required',
        ]);

        // сохраняются данные в модель и редирект на страницу со всеми постами
        $card                = new Post();
        $card->title         = $request->input('title');
        $card->description   = $request->input('description');
        $card->content       = $request->input('content');
        $card->category_id   = $request->input('category_id');
        $card->attachment_id = $request->input('attachment_id');
        $card->status_id     = $request->input('status_id');
        $card->save();

        //return redirect()->back();
        return redirect()->route('post.index');
        */
        // Контроллер, где поле status_id автоматически сохраняется
        $request->validate([
            'title' => 'required',
        ]);

        $user_id = Auth::id();
        // сохраняются данные в модель и редирект на страницу со всеми постами
        $card                = new Post();
        $card->title         = $request->input('title');
        $card->description   = $request->input('description');
        $card->content       = $request->input('content');
        $card->category_id   = $request->input('category_id');
        $card->attachment_id = $request->input('attachment_id');
        $card->status_id     = $request->input('status_id');

        // Получение значения для statusid из таблицы statuses по id
        $defaultStatusId = 9; // id статуса "Нет модератора"
        $card->status_id = $defaultStatusId;
        $card->user_id = $user_id;
        $card->save();



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
        $categories = Category::pluck('title', 'id')->all();
        $statuses   = Status::pluck('title', 'id')->all();
        $post = Post::find($id); // Получаем данные поста по переданному идентификатору
        return view('edit', compact('post', 'categories', 'statuses')); // Передаем данные поста на страницу редактирования
    }
    public function update(Request $request, $id) {
        // изменение записи
        // со страницы edit на контроллер отправляется id поста и его данные
        // записываем все данные и переходим на главную страницу
        $request->validate([
            'title' => 'required',
        ]);

        $post                = Post::find($id);
        $post->title         = $request->input('title');
        $post->description   = $request->input('description');
        $post->content       = $request->input('content');
        $post->category_id   = $request->input('category_id');
        $post->attachment_id = $request->input('attachment_id');
        $post->status_id     = $request->input('status_id');
        $post->save();

        return redirect()->route('post.index');
    }
    // API
    public function PostAllToJSON(Request $request) {
        $posts = Post::all();
        return response()->json($posts, 200);
    }
    public function storeAll(Request $request)
    {
        /* первая версия
        $card                = new Post();
        $card->title         = $request->input('title');
        $card->description   = $request->input('description');
        $card->content       = $request->input('content');
        $card->category_id   = $request->input('category_id');
        $card->attachment_id = $request->input('attachment_id');
        $card->status_id     = $request->input('status_id');

        // Получение значения для statusid из таблицы statuses по id
        $defaultStatusId     = 9; // id статуса "Нет модератора"
        $card->status_id     = $defaultStatusId;
        $card->user_id       = $request->input('user_id');
        $card->save();
        return response()->json(['message' => 'Data saved successfully'], 200);
        */
        // Проверяем наличие токена в заголовке Authorization
        if (!$request->header('Authorization')) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        // Получаем токен из заголовка и декодируем его
        /*
        $token = substr($request->header('Authorization'), 7); // удаляем 'Bearer '
        //$tokenData = JWT::decode($token, 'your_secret_key', ['HS256']);
        $secret_key = 'afsafaf';
        $headers = new \stdClass();
        $headers->alg = 'HS256'; // укажите используемый алгоритм шифрования
        $tokenData = JWT::decode($token, $secret_key, $headers);
*/
        // Создаем новую запись для данных из запроса
        // Получение токена из заголовков запроса
        $token = $request->header('Authorization');

        // Декодирование токена и извлечение ID пользователя
        $token_parts = explode(' ', $token);
        $decoded_token = JWTAuth::setToken($token_parts[1])->toUser(); // Декодируем токен и получаем пользователя
        $user_id = $decoded_token->id; // Получаем ID пользователя
        $card = new Post();
        $card->title = $request->input('title');
        $card->description = $request->input('description');
        $card->content = $request->input('content');
        $card->category_id = $request->input('category_id');
        $card->attachment_id = $request->input('attachment_id');

        // Получение пользователя из токена и ассоциирование с данными
        $card->user_id = $user_id;

        // Получение значения для status_id из таблицы statuses по id
        $defaultStatusId = 9; // id статуса "Нет модератора"
        $card->status_id = $defaultStatusId;

        $card->save();

        return response()->json(['message' => 'Data saved successfully'], 200);
    }

    public function updateAll(Request $request)
    {
        if (!$request->header('Authorization')) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }
        $token = $request->header('Authorization');

        $token_parts = explode(' ', $token);
        $decoded_token = JWTAuth::setToken($token_parts[1])->toUser(); // Декодируем токен и получаем пользователя
        $user_id = $decoded_token->id; // Получаем ID пользователя
        $card = new Post();
        $card->title = $request->input('title');
        $card->description = $request->input('description');
        $card->content = $request->input('content');
        $card->category_id = $request->input('category_id');
        $card->attachment_id = $request->input('attachment_id');

        // Получение пользователя из токена и ассоциирование с данными
        $card->user_id = $user_id;

        // Получение значения для status_id из таблицы statuses по id
        $defaultStatusId = 9; // id статуса "Нет модератора"
        $card->status_id = $defaultStatusId;

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

