<?php

namespace App\Http\Controllers;

use App\Models\Matakuliah;
use App\Models\User;
use Illuminate\Http\Request;

class MatkulController extends Controller
{
    public function index()
    {
        $dataMatkul = Matakuliah::all();
        return view('dashboard.matkul.index', compact('dataMatkul'));
    }

    public function create()
    {
        $dosen = User::role('dosen')->get();
        return view('dashboard.matkul.create',compact('dosen'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_matkul' => 'required',
            'kd_matkul' => 'required',
            'sks' => 'required',
            'semester' => 'required',
            'durasi' => 'required',
            'nidn_id' => 'required'
        ]);
        Matakuliah::create([
            'nama_matkul' => $request['nama_matkul'],
            'kd_matkul' => $request['kd_matkul'],
            'sks' => $request['sks'],
            'semester' => $request['semester'],
            'durasi' => $request['durasi'],
            'nidn_id' => $request['nidn_id']
        ]);


        return redirect()->route('matkul.index')
            ->with('success', 'User "matkul" created successfully.');
    }

    public function show(User $user)
    {
        return view('users.show', compact('user'));
    }

    public function edit(Matakuliah $user)
    {
        $dosen = User::role('dosen')->get();
        return view('dashboard.matkul.edit', compact('user', 'dosen'));
    }
    public function update(Request $request, Matakuliah $user)
    {

        $user->update([
            'nama_matkul' => $request['nama_matkul'],
            'kd_matkul' => $request['kd_matkul'],
            'sks' => $request['sks'],
            'semester' => $request['semester'],
            'durasi' => $request['durasi'],
            'nidn_id' => $request['nidn_id']
        ]);
        return redirect()->route('matkul.index')
            ->with('success', 'User updated successfully');
    }
    public function destroy(Matakuliah $user)
    {
        $user->delete();
        return redirect()->route('matkul.index')
            ->with('success', 'User deleted successfully');
    }

}
