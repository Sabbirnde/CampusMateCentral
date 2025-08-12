<?php

namespace App\Http\Controllers;

use App\Models\Schedule;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    public function index()
    {
        $schedules = Schedule::all();
        return view('schedules.index', compact('schedules'));
    }

    public function show($id)
    {
        $schedule = Schedule::findOrFail($id);
        return view('schedules.show', compact('schedule'));
    }

    public function create()
    {
        return view('schedules.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'student_id' => 'required|exists:students,id',
            'day' => 'required',
            'time' => 'required',
            'course' => 'required',
            'code' => 'required',
            'type' => 'required',
            'location' => 'required',
            'instructor' => 'required',
            'is_online' => 'boolean',
        ]);
        Schedule::create($data);
        return redirect()->route('schedules.index');
    }

    public function edit($id)
    {
        $schedule = Schedule::findOrFail($id);
        return view('schedules.edit', compact('schedule'));
    }

    public function update(Request $request, $id)
    {
        $schedule = Schedule::findOrFail($id);
        $data = $request->validate([
            'student_id' => 'required|exists:students,id',
            'day' => 'required',
            'time' => 'required',
            'course' => 'required',
            'code' => 'required',
            'type' => 'required',
            'location' => 'required',
            'instructor' => 'required',
            'is_online' => 'boolean',
        ]);
        $schedule->update($data);
        return redirect()->route('schedules.index');
    }

    public function destroy($id)
    {
        $schedule = Schedule::findOrFail($id);
        $schedule->delete();
        return redirect()->route('schedules.index');
    }
}
