@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Class Schedule</h1>
    <form action="{{ route('class_schedules.update', $classSchedule) }}" method="POST">
        @csrf
        @method('PUT')
        
        <!-- Class Name -->
        <div class="mb-3">
            <label for="class_name" class="form-label">Class Name</label>
            <input 
                type="text" 
                name="class_name" 
                id="class_name" 
                class="form-control @error('class_name') is-invalid @enderror" 
                value="{{ old('class_name', $classSchedule->class_name) }}" 
                required>
            @error('class_name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Instructor -->
        <div class="mb-3">
            <label for="instructor" class="form-label">Instructor</label>
            <input 
                type="text" 
                name="instructor" 
                id="instructor" 
                class="form-control @error('instructor') is-invalid @enderror" 
                value="{{ old('instructor', $classSchedule->instructor) }}" 
                required>
            @error('instructor')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Date -->
        <div class="mb-3">
            <label for="date" class="form-label">Date</label>
            <input 
                type="date" 
                name="date" 
                id="date" 
                class="form-control @error('date') is-invalid @enderror" 
                value="{{ old('date', $classSchedule->date) }}" 
                required>
            @error('date')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Start Time -->
        <div class="mb-3">
            <label for="start_time" class="form-label">Start Time</label>
            <input 
                type="time" 
                name="start_time" 
                id="start_time" 
                class="form-control @error('start_time') is-invalid @enderror" 
                value="{{ old('start_time', $classSchedule->start_time) }}" 
                required>
            @error('start_time')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- End Time -->
        <div class="mb-3">
            <label for="end_time" class="form-label">End Time</label>
            <input 
                type="time" 
                name="end_time" 
                id="end_time" 
                class="form-control @error('end_time') is-invalid @enderror" 
                value="{{ old('end_time', $classSchedule->end_time) }}" 
                required>
            @error('end_time')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Location -->
        <div class="mb-3">
            <label for="location" class="form-label">Location</label>
            <input 
                type="text" 
                name="location" 
                id="location" 
                class="form-control @error('location') is-invalid @enderror" 
                value="{{ old('location', $classSchedule->location) }}">
            @error('location')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Submit Button -->
        <button type="submit" class="btn btn-primary">Save Changes</button>
        <a href="{{ route('class_schedules.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
