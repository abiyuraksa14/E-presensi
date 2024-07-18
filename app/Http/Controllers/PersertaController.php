<?php

namespace App\Http\Controllers;

use App\Models\Perserta;
use Illuminate\Http\Request;
use App\Models\User;

class PersertaController extends Controller
{
    public function index()
    {
        $dataPerserta = Perserta::all();
        return view('dashboard.perserta.index', compact('dataPerserta'));
    }

    public function create()
    {
        $dosen = User::role('dosen')->get();
        return view('dashboard.perserta.create',compact('dosen'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'kd_matkul' => 'required',
            'nama_mhs' => 'required',
            'nidn' => 'required',
            'jumlahp' => 'required'

        ]);
        Perserta::create([
            'kd_matkul' => $request['kd_matkul'],
            'nama_mhs' => $request['nama_mhs'],
            'nidn' => $request['nidn'],
            'jumlahp' => $request['jumlahp']

        ]);


        return redirect()->route('Perserta.index')
            ->with('success', 'User "Perserta" created successfully.');
    }

    public function show(User $user)
    {
        return view('users.show', compact('user'));
    }

    public function edit(Perserta $user)
    {
        $dosen = User::role('dosen')->get();
        return view('dashboard.Perserta.edit', compact('user', 'dosen'));
    }
    public function update(Request $request, Perserta $user)
    {

        $user->update([
           'kd_matkul' => $request['kd_matkul'],
            'nama_mhs' => $request['nama_mhs'],
            'nidn' => $request['nidn'],
            'jumlahp' => $request['jumlahp']
        ]);
        return redirect()->route('Perserta.index')
            ->with('success', 'User updated successfully');
    }
    public function destroy(Perserta $user)
    {
        $user->delete();
        return redirect()->route('Perserta.index')
            ->with('success', 'User deleted successfully');
    }

}
