<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Teacher;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index()
    {
        return Course::with('teacher')->get();
    }

    public function create()
    {
        return view('courses.create', ['teachers' => Teacher::all()]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'teacher_id' => 'required|exists:teachers,id'
        ]);

        Course::create($validated);
        return redirect()->route('courses.index');
    }

    public function show(Course $course)
    {
        return view('courses.show', ['course' => $course]);
    }

    public function edit(Course $course)
    {
        return view('courses.edit', [
            'course' => $course,
            'teachers' => Teacher::all()
        ]);
    }

    public function update(Request $request, Course $course)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'teacher_id' => 'required|exists:teachers,id'
        ]);

        $course->update($validated);
        return redirect()->route('courses.index');
    }

    public function destroy(Course $course)
    {
        $course->delete();
        return redirect()->route('courses.index');
    }
}
