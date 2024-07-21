<?php

namespace App\Http\Controllers;

use App\Imports\PesertaImport;
use App\Models\Matakuliah;
use App\Models\Perserta;
use Illuminate\Http\Request;
use App\Models\User;
use Maatwebsite\Excel\Facades\Excel;

class PersertaController extends Controller
{
    public function index()
    {
        $dataPerserta = Perserta::all();
        return view('dashboard.perserta.index', compact('dataPerserta'));
    }

    public function by_excel()
    {
        return view('dashboard.perserta.create-excel');
    }

    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,xls',
        ]);

        $file = $request->file('file');

        Excel::import(new PesertaImport, $file);

        return redirect('/data-perserta')->with('success', 'Data mahasiswa berhasil diimport.');
    }

    public function create()
    {
        $mahasiswa = User::role('mahasiswa')->get();
        $matkul = Matakuliah::all();
        return view('dashboard.perserta.create',compact('mahasiswa', 'matkul'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_matkul' => 'required',
            'id_mahasiswa' => 'required'
        ]);
        Perserta::create([
            'id_matkul' => $request['id_matkul'],
            'id_mahasiswa' => $request['id_mahasiswa']
        ]);


        return redirect('/data-perserta')
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
            'nim' => $request['nim']

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
