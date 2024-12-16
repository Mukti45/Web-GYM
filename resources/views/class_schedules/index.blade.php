@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Daftar Jadwal Kelas</h1>
    <a href="{{ route('class_schedules.create') }}" class="btn btn-primary">Tambah Jadwal</a>
    <table class="table mt-3">
        <thead>
            <tr>
                <th>Nama Kelas</th>
                <th>Instruktur</th>
                <th>Tanggal</th>
                <th>Jam</th>
                <th>Lokasi</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($classSchedules as $schedule)
                <tr>
                    <td>{{ $schedule->class_name }}</td>
                    <td>{{ $schedule->instructor }}</td>
                    <td>{{ \Carbon\Carbon::parse($schedule->date)->format('d-m-Y') }}</td>
                    <td>{{ $schedule->start_time }} - {{ $schedule->end_time }}</td>
                    <td>{{ $schedule->location }}</td>
                    <td>
                        <a href="{{ route('class_schedules.show', $schedule) }}" class="btn btn-warning">Show</a>
                        <a href="{{ route('class_schedules.edit', $schedule) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('class_schedules.destroy', $schedule) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
