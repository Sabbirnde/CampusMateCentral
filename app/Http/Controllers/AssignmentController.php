<?php

namespace App\Http\Controllers;

use App\Models\Assignment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AssignmentController extends Controller
{
    public function index()
    {
        $assignments = Assignment::all();
        return view('assignments.index', compact('assignments'));
    }

    public function show($id)
    {
        $assignment = Assignment::findOrFail($id);
        return view('assignments.show', compact('assignment'));
    }

    public function create()
    {
        return view('assignments.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required',
            'subject' => 'required',
            'due_date' => 'required|date',
            'description' => 'nullable',
            'max_size' => 'nullable',
            'allowed_formats' => 'nullable',
            'student_id' => 'nullable|exists:students,id',
            'file' => 'nullable|file',
            'status' => 'nullable',
            'priority' => 'nullable',
            'submission_text' => 'nullable',
        ]);
        if ($request->hasFile('file')) {
            $data['file_path'] = $request->file('file')->store('assignments');
        }
        Assignment::create($data);
        return redirect()->route('assignments.index');
    }

    public function edit($id)
    {
        $assignment = Assignment::findOrFail($id);
        return view('assignments.edit', compact('assignment'));
    }

    public function update(Request $request, $id)
    {
        $assignment = Assignment::findOrFail($id);
        $data = $request->validate([
            'title' => 'required',
            'subject' => 'required',
            'due_date' => 'required|date',
            'description' => 'nullable',
            'max_size' => 'nullable',
            'allowed_formats' => 'nullable',
            'student_id' => 'nullable|exists:students,id',
            'file' => 'nullable|file',
            'status' => 'nullable',
            'priority' => 'nullable',
            'submission_text' => 'nullable',
        ]);
        if ($request->hasFile('file')) {
            $data['file_path'] = $request->file('file')->store('assignments');
        }
        $assignment->update($data);
        return redirect()->route('assignments.index');
    }

    public function destroy($id)
    {
        $assignment = Assignment::findOrFail($id);
        if ($assignment->file_path) {
            Storage::delete($assignment->file_path);
        }
        $assignment->delete();
        return redirect()->route('assignments.index');
    }
}
