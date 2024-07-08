<?php
namespace App\Http\Controllers;
use App\Models\Status;
use Illuminate\Http\Request;
class StatusController extends Controller {
    public function index(Request $request)
    {
        $statuses = Status::all();
        return view('statuses.index', compact('statuses'));
    }
    public function create(Request $request)
    {
        return view('statuses.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
        ]);
        $status        = new Status();
        $status->title = $request->input('title');
        $status->save();
        return redirect()->route('status.index');
    }
    public function delete($id) {
        // удаление записи
        $status = Status::findOrFail($id);
        $status->delete();
        return redirect()->back();
    }
    public function edit($id) {
        $status = Status::find($id);
        return view('statuses.edit', compact('status'));
    }
    public function update(Request $request, $id) {
        $request->validate([
            'title' => 'required',
        ]);
        $status        = Status::find($id);
        $status->title = $request->input('title');
        $status->save();

        return redirect()->route('status.index');
    }
    public function StatusAllToJSON(Request $request) {
        $statuses = Status::all();
        return response()->json($statuses, 200);
    }
    public function show($id)
    {
        $status = Status::find($id);

        if (!$status) {
            return response()->json(['error' => 'Post not found'], 404);
        }
        return response()->json($status, 200);
    }

}
