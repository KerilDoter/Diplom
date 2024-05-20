<?php

namespace App\Http\Controllers;

use App\Models\Moderated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;
use App\Models\User;

class ModeratedController extends Controller
{
    public function store($id)
    {
        $user_id = Auth::id();
        $post = Post::find($id);
        $moderated = new Moderated();
        $moderated->user_id = $user_id;
        $moderated->post_id = $post->id;

        $moderated->save();
        $post->is_moderated = $moderated->id;
        $post->save();

        return redirect()->back();
    }
}
