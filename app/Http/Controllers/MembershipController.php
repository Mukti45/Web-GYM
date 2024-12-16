<?php

namespace App\Http\Controllers;

use App\Models\Membership;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MembershipController extends Controller
{
    public function index()
    {
        $memberships = Membership::all();
        if (Auth::user()->hasRole('admin')) {
            return view('admin.memberships.index', compact('memberships')); // Halaman untuk admin
        }
    
        if (Auth::user() && Auth::user()->hasRole('user')) {
            return view('user.memberships.index', compact('memberships')); // Menggunakan $pemesanan untuk view user
        }
    
        abort(403, 'Access denied.');
    }
        
    

    // Menampilkan form untuk membuat membership baru
    public function create()
    {
        if (!Auth::check() || !Auth::user()->hasRole('user')) {
            abort(403, 'Hanya User yang dapat menambahkan pesanan');
        }
        $memberships = Membership::all();
        
    
        return view('user.memberships.create', compact('memberships'));
    }

    // Menyimpan data membership baru
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
        ]);

        Membership::create($request->all());
        return redirect()->route('memberships.index');
    }

    // Menampilkan form untuk mengedit membership
    public function edit(Membership $membership)
    {
        return view('admin.memberships.edit', compact('membership'));
    }

    // Memperbarui data membership
    public function update(Request $request, Membership $membership)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
        ]);

        $membership->update($request->all());
        return redirect()->route('admin.memberships.index');
    }
    public function show(Membership $membership)
    {
        // Memuat data pemesanan termasuk menu dan paket hemat
        $membership = Membership::findOrFail($membership->id);
        // Menentukan apakah user adalah admin atau user biasa
        if (Auth::user() && Auth::user()->hasRole('admin')) {
            return view('user.dashboard.index', compact('memberships')); // Menggunakan $pemesanan untuk view admin
        }

        if (Auth::user() && Auth::user()->hasRole('user')) {
            return view('user.memberships.show', compact('memberships')); // Menggunakan $pemesanan untuk view user
        }

        abort(403, 'Access denied.');
    }
    // Menghapus membership
    public function destroy($id)
    {
        $membership = Membership::findOrFail($id);
        $membership->delete(); // Soft delete data
    
        return redirect()->route('user.memberships.index')->with('success', 'Membership has been deleted.');
    }
}
