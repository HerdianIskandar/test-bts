<?php

namespace App\Http\Controllers\Api;

use App\Models\Checklist;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ChecklistController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $checklist = Checklist::all();

        return response()->json(['data' => $checklist], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $checklist = Checklist::create($request->all());
        $checklist->refresh();

        return response()->json(['data' => $checklist], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Checklist $checklist)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Checklist $checklist)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Checklist $checklist)
    {
        $checklist = $checklist->findOrFail($checklist->id);
        $checklist->delete();

        return response()->json(['data' => $checklist], 200);
    }
}
