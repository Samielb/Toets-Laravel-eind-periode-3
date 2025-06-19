<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Subject;
use App\Models\Vak;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Subject::with('teacher')->orderBy('naam')->get();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'=>'required',
            'description' => 'nullable',
            'teacher_id' => 'required|exists:docents,id',
        ]);

        return Subject::create($validated);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return Subject::with('teacher')->findOrFail($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $vak = Subject::findOrFail($id);
        $vak->update($request->all());
        return $vak;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Subject::destroy($id);
        return response()->noContent();
    }
}