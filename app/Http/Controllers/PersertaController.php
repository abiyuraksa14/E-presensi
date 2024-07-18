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
            'id_Perserta' => 'required',
            'nama_Perserta' => 'required',
            'kd_Perserta' => 'required',
            'sks' => 'required',
            'semester' => 'required',
            'durasi' => 'required',
            'nidn_id' => 'required'
        ]);
        Perserta::create([
            'id_Perserta' => $request['id_Perserta'],
            'nama_Perserta' => $request['nama_Perserta'],
            'kd_Perserta' => $request['kd_Perserta'],
            'sks' => $request['sks'],
            'semester' => $request['semester'],
            'durasi' => $request['durasi'],
            'nidn_id' => $request['nidn_id']
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
            'id_Perserta' => $request['id_Perserta'],
            'nama_Perserta' => $request['nama_Perserta'],
            'kd_Perserta' => $request['kd_Perserta'],
            'sks' => $request['sks'],
            'semester' => $request['semester'],
            'durasi' => $request['durasi'],
            'nidn_id' => $request['nidn_id']
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
