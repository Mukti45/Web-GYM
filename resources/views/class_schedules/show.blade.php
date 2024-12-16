@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Class Schedule Details</h1>
    <div class="card">
        <div class="card-header">
            {{ $classSchedule->class_name }}
        </div>
        <div class="card-body">
            <h5 class="card-title">Instructor: {{ $classSchedule->instructor }}</h5>
            <p class="card-text">
                <strong>Date:</strong> {{ \Carbon\Carbon::parse($classSchedule->date)->format('d-m-Y') }}<br>
                <strong>Start Time:</strong> {{ \Carbon\Carbon::parse($classSchedule->start_time)->format('H:i') }}<br>
                <strong>End Time:</strong> {{ \Carbon\Carbon::parse($classSchedule->end_time)->format('H:i') }}<br>
                <strong>Location:</strong> {{ $classSchedule->location ?? 'Not specified' }}
            </p>
            <a href="{{ route('class_schedules.index') }}" class="btn btn-secondary">Back to Schedules</a>
            <a href="{{ route('class_schedules.edit', $classSchedule) }}" class="btn btn-warning">Edit Schedule</a>
        </div>
    </div>
</div>
@endsection
