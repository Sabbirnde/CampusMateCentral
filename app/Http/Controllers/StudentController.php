<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::all();
        return view('students.index', compact('students'));
    }

    public function show($id)
    {
        $student = Student::findOrFail($id);
        return view('students.show', compact('student'));
    }

    public function create()
    {
        return view('students.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'full_name' => 'required',
            'student_id' => 'required|unique:students',
            'email' => 'required|email|unique:students',
            'phone' => 'nullable',
            'address' => 'nullable',
            'bio' => 'nullable',
        ]);
        Student::create($data);
        return redirect()->route('students.index');
    }

    public function edit($id)
    {
        $student = Student::findOrFail($id);
        return view('students.edit', compact('student'));
    }

    public function update(Request $request, $id)
    {
        $student = Student::findOrFail($id);
        $data = $request->validate([
            'full_name' => 'required',
            'student_id' => 'required|unique:students,student_id,' . $id,
            'email' => 'required|email|unique:students,email,' . $id,
            'phone' => 'nullable',
            'address' => 'nullable',
            'bio' => 'nullable',
        ]);
        $student->update($data);
        return redirect()->route('students.index');
    }

    public function destroy($id)
    {
        $student = Student::findOrFail($id);
        $student->delete();
        return redirect()->route('students.index');
    }
}
