<?php

namespace App\Http\Controllers\Api;

use App\Models\Todo;
use App\Models\Checklist;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Checklist $checklist)
    {
        $todo = $checklist->todos()->filter(['checklist' => $checklist])->get();

        return response()->json(['data' => $todo], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Checklist $checklist)
    {
        $request->validate([
            'itemName' => 'required',
        ]);

        $todo = Todo::create([
            'name' => $request->itemName,
            'checklist_id' => $checklist->id,
        ]);
        $todo->refresh();

        return response()->json(['data' => $todo], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Checklist $checklist, Todo $todo)
    {
        $filter = $checklist->todos()->filter(['checklist' => $checklist, 'todo' => $todo])->get();

        return response()->json(['data' => $filter], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Checklist $checklist, Todo $todo)
    {
        $todo = $todo->findOrFail($todo->id);

        $todo->update([
            'name' => isset($request->itemName) ? $request->itemName : $todo->name,
            'status' => isset($request->status) ? $request->status : $todo->status,
        ]);
        $todo->refresh();

        return response()->json(['data' => $todo], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Checklist $checklist, Todo $todo)
    {
        $todo = $todo->findOrFail($todo->id);
        $todo->delete();

        return response()->json(['data' => $todo], 200);
    }
}
