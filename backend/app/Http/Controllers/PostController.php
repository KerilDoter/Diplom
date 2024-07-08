<?php
namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Moderated;
use App\Models\Post;
use App\Models\Status;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Firebase\JWT\JWT;
use Illuminate\Support\Facades\Log;
use Tymon\JWTAuth\Facades\JWTAuth;
use function PHPUnit\Framework\isFalse;

class PostController extends Controller {
    public function index(Request $request)
    {
        $users = User::all();
        $posts = Post::all();
        return view('index', compact('posts', 'users'));
    }
    public function create() {
        $posts      = Post::all();
        $categories = Category::pluck('title', 'id')->all();
        $statuses   = Status::pluck('title', 'id')->all();
        return view('create',
            compact('categories', 'statuses', 'posts'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
        ]);
        $user_id = Auth::id();
        $card                = new Post();
        $card->title         = $request->input('title');
        $card->description   = $request->input('description');
        $card->content       = $request->input('content');
        $card->category_id   = $request->input('category_id');
        $card->attachment_id = $request->input('attachment_id');
        $card->status_id     = $request->input('status_id');
        $defaultStatusId = 9;
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
        $moderated = Moderated::all();
        $user = User::all();
        $categories = Category::pluck('title', 'id')->all();
        $statuses = Status::pluck('title', 'id')->all();
        $post = Post::find($id);
        return view('edit',
            compact('post',
                'categories',
                'statuses',
                'moderated',
                'user'));
    }
    public function update(Request $request, $id) {

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
        $posts = Post::all()->map(function ($post) {
            if ($post->status) {
                $post->status_id = $post->status->title;
            } else {
                $post->status_id = 'Unknown Status';
            }

            if ($post->user) {
                $post->user_id = $post->user->surname . ' ' . $post->user->name;
            } else {
                $post->user_id = 'Unknown User';
            }

            return $post;
        });
        return response()->json($posts, 200);
    }

    public function storeAllFirstVersion(Request $request)
    {
        if (!$request->header('Authorization')) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }
        $token = $request->header('Authorization');
        $token_parts = explode(' ', $token);
        $decoded_token = JWTAuth::setToken($token_parts[1])->toUser();
        $user_id = $decoded_token->id;
        $card = new Post();
        $card->title = $request->input('title');
        $card->description = $request->input('description');
        $card->content = $request->input('content');
        $card->category_id = $request->input('category_id');
        $card->attachment_id = $request->input('attachment_id');
        $card->user_id = $user_id;
        $defaultStatusId = 9;
        $card->status_id = $defaultStatusId;
        $card->save();
        return response()->json(['message' => 'Data saved successfully'], 200);
    }
    public function storeAll(Request $request)
    {
        if (!$request->header('Authorization')) {
            return response()->json(['error' => 'Не авторизован'], 401);
        }
        try {
            $token = $request->header('Authorization');
            $token_parts = explode(' ', $token);
            $decoded_token = JWTAuth::setToken($token_parts[1])->toUser();
            $user_id = $decoded_token->id;
            $card = new Post();
            $card->title = $request->input('title');
            $card->description = $request->input('description');
            $card->content = $request->input('content');
            $card->category_id = $request->input('category_id');
            $card->attachment_id = $request->input('attachment_id');
            $card->user_id = $user_id;
            $defaultStatusId = 9;
            $card->status_id = $defaultStatusId;
            $card->save();
            return response()->json(['message' => 'Данные успешно сохранены'], 200);
        } catch (\Exception $e) {
            Log::error('Ошибка при сохранении данных: ' . $e->getMessage());
            return response()->json(['error' => 'Ошибка сервера'], 500);
        }
    }
    public function updateAll(Request $request)
    {
        if (!$request->header('Authorization')) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }
        $token = $request->header('Authorization');
        $token_parts = explode(' ', $token);
        $decoded_token = JWTAuth::setToken($token_parts[1])->toUser();
        $user_id = $decoded_token->id;
        $card = new Post();
        $card->title = $request->input('title');
        $card->description = $request->input('description');
        $card->content = $request->input('content');
        $card->category_id = $request->input('category_id');
        $card->attachment_id = $request->input('attachment_id');
        $card->user_id = $user_id;
        $defaultStatusId = 9;
        $card->status_id = $defaultStatusId;
        $card->save();
        return response()->json(['message' => 'Data saved successfully'], 200);
    }
    public function show($id)
    {
        $post = Post::find($id);
        if ($post->status) {
            $post->status_id = $post->status->title;
        } else {
            $post->status_id = 'Unknown Status';
        }
        if ($post->user) {
            $post->user_id = $post->user->surname . ' ' . $post->user->name;
        } else {
            $post->user_id = 'Unknown User';
        }
        if (!$post) {
            return response()->json(['error' => 'Post not found'], 404);
        }
        return response()->json($post, 200);
    }
    public function getPostCount()
    {
        $posts = Post::count();
        if($posts=== 0) {
            return response()->json(['posts' => 0]);
        }
        return response()->json(['posts' => $posts]);
    }
    public function getPostsInModeration()
    {
        $postsInModerationCount = Post::where('is_moderated', '0')->count();

        return response()->json(['posts_in_moderation' => $postsInModerationCount]);
    }
    public function getReadyPosts()
    {
        $readyPostsCount = Post::where('status_id', '6')->count();

        return response()->json(['ready_posts' => $readyPostsCount]);
    }
}

