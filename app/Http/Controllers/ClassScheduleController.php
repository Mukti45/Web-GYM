<?php

namespace App\Http\Controllers;

use App\Models\ClassSchedule;
use Illuminate\Http\Request;

class ClassScheduleController extends Controller
{
    public function index()
    {
        $classSchedules = ClassSchedule::all();
        return view('class_schedules.index', compact('classSchedules'));
    }

    public function create()
    {
        return view('class_schedules.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'class_name' => 'required',
            'instructor' => 'required',
            'date' => 'required|date',
            'start_time' => 'required',
            'end_time' => 'required',
        ]);

        ClassSchedule::create($request->all());
        return redirect()->route('class_schedules.index');
    }

    public function edit(ClassSchedule $classSchedule)
    {
        return view('class_schedules.edit', compact('classSchedule'));
    }

    public function update(Request $request, ClassSchedule $classSchedule)
    {
        $request->validate([
            'class_name' => 'required',
            'instructor' => 'required',
            'date' => 'required|date',
            'start_time' => 'required',
            'end_time' => 'required',
        ]);

        $classSchedule->update($request->all());
        return redirect()->route('class_schedules.index');
    }

    public function show(ClassSchedule $classSchedule)
{
    return view('class_schedules.show', compact('classSchedule'));
}

    public function destroy(ClassSchedule $classSchedule)
    {
        $classSchedule->delete();
        return redirect()->route('class_schedules.index');
    }
}
