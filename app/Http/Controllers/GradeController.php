<?php

namespace App\Http\Controllers;

use App\Models\Grade;
use Illuminate\Http\Request;

class GradeController extends Controller
{
    public function index()
    {
        $grades = Grade::all();
        return view('grades.index', compact('grades'));
    }

    public function show($id)
    {
        $grade = Grade::findOrFail($id);
        return view('grades.show', compact('grade'));
    }

    public function create()
    {
        return view('grades.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'student_id' => 'required|exists:students,id',
            'course' => 'required',
            'code' => 'required',
            'assignment_name' => 'required',
            'grade' => 'nullable|numeric',
            'max_grade' => 'nullable|numeric',
            'weight' => 'nullable|numeric',
            'submitted_date' => 'nullable',
            'current_grade' => 'nullable|numeric',
            'credits' => 'nullable|integer',
        ]);
        Grade::create($data);
        return redirect()->route('grades.index');
    }

    public function edit($id)
    {
        $grade = Grade::findOrFail($id);
        return view('grades.edit', compact('grade'));
    }

    public function update(Request $request, $id)
    {
        $grade = Grade::findOrFail($id);
        $data = $request->validate([
            'student_id' => 'required|exists:students,id',
            'course' => 'required',
            'code' => 'required',
            'assignment_name' => 'required',
            'grade' => 'nullable|numeric',
            'max_grade' => 'nullable|numeric',
            'weight' => 'nullable|numeric',
            'submitted_date' => 'nullable',
            'current_grade' => 'nullable|numeric',
            'credits' => 'nullable|integer',
        ]);
        $grade->update($data);
        return redirect()->route('grades.index');
    }

    public function destroy($id)
    {
        $grade = Grade::findOrFail($id);
        $grade->delete();
        return redirect()->route('grades.index');
    }
}
