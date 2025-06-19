<?php

namespace App\Http\Controllers;
use App\Models\Subject;
use App\Models\Teachers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ViewController extends Controller
{
    public function subjects()
    {
        $subjects = DB::table('subjects')
            ->join('teachers', 'subjects.teacher_id', '=', 'teachers.id')
            ->select('subjects.*', 'teachers.naam as teacher_name')
            ->orderBy('subjects.name')
            ->get();

        return response()->json($subjects);
    }

    public function teachers()
    {
        $teachers = DB::table('teachers')
            ->join('subjects', 'teachers.id', '=', 'subjects.teacher_id')
            ->selectRaw('teachers.id, teachers.naam, GROUP_CONCAT(subjects.name) as subject_names')
            ->groupBy('teachers.id', 'teachers.naam')
            ->orderBy('teachers.naam')
            ->get();

        return response()->json($teachers);
    }
}
