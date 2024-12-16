<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all(); // Ambil semua pengguna dari database
        return view('user.dashboard', compact('users')); // Kembalikan ke view users.index
    }

    public function dashboard()
{
    return view('user.dashboard');  // Halaman dashboard admin
}

}