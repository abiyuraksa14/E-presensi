<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class DosenController extends Controller
{
    public function index()
    {
        $dataDsn = User::role('dosen')->get();
        return view('dashboard.dosen.index', compact('dataDsn'));
    }

    public function create()
    {
        return view('dashboard.dosen.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'name' => 'required',
            'email' => 'required',
            'password' => 'required'
        ]);
        $dosen= User::create([
            'username' => $request['username'],
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => bcrypt($request['password']),
        ]);
        $dosen->assignRole('dosen');

        return redirect()->route('dosen.index')
            ->with('success', 'User "dosen" created successfully.');
    }

    public function show(User $user)
    {
        return view('users.show', compact('user'));
    }

    public function edit(User $user)
    {
        return view('dashboard.dosen.edit', compact('user'));
    }
    public function update(Request $request, User $user)
    {
        $request->validate([
            'username' => 'required',
            'name' => 'required',
            'email' => 'required',
            'password' => 'required'
        ]);
        $user->update([
            'username' => $request['username'],
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => bcrypt($request['password']),
        ]);
        return redirect()->route('dosen.index')
            ->with('success', 'User updated successfully');
    }
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('dosen.index')
            ->with('success', 'User deleted successfully');
    }

}
