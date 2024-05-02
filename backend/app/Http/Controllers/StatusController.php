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
        // сохраняются данные в модель и редирект на страницу со всеми постами
        $status        = new Status();
        $status->title = $request->input('title');
        $status->save();
        $request->validate([
            'title' => 'required',
        ]);
        return redirect()->route('status.index');

    }
    public function delete($id) {
        // удаление записи
        $status = Status::findOrFail($id);
        $status->delete();
        return redirect()->back();
    }
    public function edit($id) {
        $status = Status::find($id); // Получаем данные поста по переданному идентификатору
        return view('statuses.edit', compact('status')); // Передаем данные поста на страницу редактирования
    }
    public function update(Request $request, $id) {
        $status        = Status::find($id);
        $status->title = $request->input('title');
        $status->save();
        $request->validate([
            'title' => 'required',
        ]);
        return redirect()->route('status.index');
    }
    // API
    public function StatusAllToJSON(Request $request) {
        $statuses = Status::all();
        return response()->json($statuses, 200);
    }

    // для конкретного поста
    public function show($id)
    {
        $status = Status::find($id);

        if (!$status) {
            return response()->json(['error' => 'Post not found'], 404);
        }

        return response()->json($status, 200);
    }

}
