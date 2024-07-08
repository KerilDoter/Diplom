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
        $request->validate([
            'title' => 'required',
        ]);
        $tag               = new Tag();
        $tag->title        = $request->input('title');
        $tag->save();
        return redirect()->route('tag.index');

    }
    public function delete($id) {
        $tag = Tag::findOrFail($id);
        $tag->delete();
        return redirect()->back();
    }
    public function edit($id) {

        $tag = Tag::find($id);
        return view('tags.edit', compact('tag'));
    }
    public function update(Request $request, $id) {
        $request->validate([
            'title' => 'required',
        ]);
        $tag        = Tag::find($id);
        $tag->title = $request->input('title');
        $tag->save();

        return redirect()->route('tag.index');
    }
    public function TagAllToJSON(Request $request) {
        $tags = Tag::all();
        return response()->json($tags, 200);
    }

    public function show($id)
    {
        $tag = Tag::find($id);
        if (!$tag) {
            return response()->json(['error' => 'Post not found'], 404);
        }
        return response()->json($tag, 200);
    }
}
