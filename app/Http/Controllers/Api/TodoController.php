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
    public function index()
    {
        //
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
    public function show(Todo $todo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Todo $todo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Todo $todo)
    {
        //
    }
}
