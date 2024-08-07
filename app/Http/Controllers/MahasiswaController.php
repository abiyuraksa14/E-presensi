<?php

namespace App\Http\Controllers;

use App\Imports\MahasiswaImport;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;

class MahasiswaController extends Controller
{
    public function index()
    {
        $dataMhs = User::role('mahasiswa')->get();
        return view('dashboard.mahasiswa.index', compact('dataMhs'));
    }



    public function by_excel()
    {
        return view('dashboard.mahasiswa.create-excel');
    }

    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,xls',
        ]);

        $file = $request->file('file');

        Excel::import(new MahasiswaImport, $file);

        return redirect('/data-mahasiswa')->with('success', 'Data mahasiswa berhasil diimport.');
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
        $mahasiswa->assignRole('mahasiswa'); //role mhs

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
