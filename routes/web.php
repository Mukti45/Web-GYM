<?php

use App\Console\Commands\UpdateMembershipStatus;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\ClassScheduleController;
use App\Http\Controllers\MembershipController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::view('/', 'heroes');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

    Route::get('/permissions/create', action: [PermissionController::class, 'create'])->name('permissions.create');
    
    Route::post('/logout', function () {
        Auth::logout();
        return redirect('/');
    })->name('logout');

require __DIR__.'/auth.php';

Route::resource('memeberships', MembershipController::class);

Route::middleware(['auth'])->group(function () {
    Route::get('/membership/create', [MembershipController::class, 'create'])->name('membership.create');
    Route::post('/membership', [MembershipController::class, 'store'])->name('membership.store');
    Route::get('/class-schedule', [ClassScheduleController::class, 'index'])->name('class-schedule.index');
    
});

Route::resource('memberships', MembershipController::class);
Route::resource('class_schedules', ClassScheduleController::class);

Route::prefix('admin')->middleware(['auth', 'verified'])->group(function () {
    // Dashboard untuk pengguna
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/memberships', [MembershipController::class, 'index'])->name('admin.memberships.index');
    Route::get('memberships/create', [MembershipController::class, 'create'])->name('admin.memberships.create');
    Route::get('memberships/show', [MembershipController::class, 'show'])->name('admin.memberships.show');
    Route::get('memberships/edit', [MembershipController::class, 'edit'])->name('admin.memberships.edit');
    Route::delete('/memberships/{id}', [MembershipController::class, 'destroy'])->name('admin.memberships.destroy');


});

Route::prefix('user')->middleware(['auth', 'verified'])->group(function () {
    // Dashboard untuk pengguna
    Route::get('/dashboard', [UserController::class, 'dashboard'])->name('user.dashboard');
    Route::get('/memberships', [MembershipController::class, 'index'])->name('user.memberships.index');
    Route::get('memberships/create', [MembershipController::class, 'create'])->name('user.memberships.create');
    Route::get('memberships/show', [MembershipController::class, 'show'])->name('user.memberships.show');
    Route::get('memberships/edit', [MembershipController::class, 'edit'])->name('user.memberships.edit');
    Route::delete('/memberships/{id}', [MembershipController::class, 'destroy'])->name('user.memberships.destroy');
});
