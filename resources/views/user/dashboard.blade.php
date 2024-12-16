@extends('layouts.user')

@section('content')
<div class="dashboard container mt-4">
    <div class="row mb-4">
        <div class="col-12 text-start">
            <h1 class="display-4">Membership Dashboard</h1>
            <p class="lead">Selamat datang di Gym Heroes, {{ Auth::user()->name }}! Kelola keanggotaan Anda dengan mudah.</p>
        </div>
    </div>

    <div class="row">
        <!-- Membership Section -->
        <div class="col-md-6 offset-md-3 mb-4">
            <div class="card h-100 shadow-sm">
                <div class="card-body">
                    <!-- Image Section -->
                    <div class="mb-3">
                        <img src="{{ asset('images/img5.jpg') }}" alt="memberships" class="img-fluid" />
                    </div>

                    <!-- Button Section -->
                    <div class="text-start">
                    <a href="{{ route('user.memberships.index') }}" class="hover:bg-gray-700 p-2 rounded-md text-black transition-all duration-300 hover:shadow-lg hover:text-white">Kelola Keanggotaan</a>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('styles')
<style>
    .membership-btn {
        transition: all 0.3s ease;
    }

    .membership-btn:hover {
        border: 2px solid #007bff; /* Blue border on hover */
        box-shadow: 0 4px 6px rgba(0, 123, 255, 0.3); /* Box shadow on hover */
    }

    .membership-btn:active {
        background-color: #0056b3; /* Darker blue on click */
        border-color: #004085; /* Darker border color */
        box-shadow: 0 2px 4px rgba(0, 123, 255, 0.5); /* Box shadow on click */
        transform: translateY(2px); /* Slight push-down effect when clicked */
    }
</style>
@endsection
