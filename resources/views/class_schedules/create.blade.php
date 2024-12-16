@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Tambah Jadwal Kelas</h1>
    <form action="{{ route('class_schedules.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="class_name" class="form-label">Nama Kelas</label>
            <input type="text" name="class_name" class="form-control" id="class_name" required>
        </div>
        <div class="mb-3">
            <label for="instructor" class="form-label">Instruktur</label>
            <input type="text" name="instructor" class="form-control" id="instructor" required>
        </div>
        <div class="mb-3">
            <label for="date" class="form-label">Tanggal</label>
            <input type="date" name="date" class="form-control" id="date" required>
        </div>
        <div class="mb-3">
            <label for="start_time" class="form-label">Jam Mulai</label>
            <input type="time" name="start_time" class="form-control" id="start_time" required>
        </div>
        <div class="mb-3">
            <label for="end_time" class="form-label">Jam Selesai</label>
            <input type="time" name="end_time" class="form-control" id="end_time" required>
        </div>
        <div class="mb-3">
            <label for="location" class="form-label">Lokasi</label>
            <input type="text" name="location" class="form-control" id="location">
        </div>
        <button type="submit" class="btn btn-success">Simpan</button>
    </form>
</div>
@endsection
