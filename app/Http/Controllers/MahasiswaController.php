<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MahasiswaController extends Controller
{
    public function index()
    {
        $dataMhs = User::role('mahasiswa')->get();
        return view('dashboard.mahasiswa.index', compact('dataMhs'));
    }

    public function create()
    {
        return view('dashboard.mahasiswa.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'name' => 'required',
            'email' => 'required',
            'password' => 'required'
        ]);
        $mahasiswa= User::create([
            'username' => $request['username'],
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => bcrypt($request['password']),
        ]);
        $mahasiswa->assignRole('mahasiswa');

        return redirect()->route('mahasiswa.index')
            ->with('success', 'User "Mahasiswa" created successfully.');
    }

    public function show(User $user)
    {
        return view('dashboard.mahasiswa.show', compact('user'));
    }

    public function edit(User $user)
    {
        return view('dashboard.mahasiswa.edit', compact('user'));
    }
    public function update(Request $request, User $user)
    {
        $user->update([
            'username' => $request['username'],
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => bcrypt($request['password']),
        ]);
        return redirect()->route('mahasiswa.index')
            ->with('success', 'User "Mahasiswa" created successfully.');
    }
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('mahasiswa.index')
            ->with('success', 'User deleted successfully');
    }
}
