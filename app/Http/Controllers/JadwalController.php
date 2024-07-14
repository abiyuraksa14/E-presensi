<?php

namespace App\Http\Controllers;

use App\Models\Jadwal;
use App\Models\User;
use Illuminate\Http\Request;

class JadwalController extends Controller
{
    public function index()
    {
        $datajadwal = Jadwal::all();
        return view('dashboard.jadwal.index', compact('datajadwal'));
    }

    public function create()
    {
        $dosen = User::role('dosen')->get();
        return view('dashboard.jadwal.create',compact('dosen'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_jadwal' => 'required',
            'hari' => 'required|string',
            'jam_mulai' => 'required|date_format:H:i',
            'jam_akhir' => 'required|date_format:H:i',
            'id_matkul' => 'required',
            'tahun_akademik' => 'required',
            'jumlah_peserta' => 'required'
        ]);
        $jadwal= Jadwal::create([
            'id_jadwal' => $request['id_jadwal'],
            'hari' => $request['hari'],
            'jam_mulai' => $request['jam_mulai'],
            'jam_akhir' => $request['jam_akhir'],
            'id_matkul' => $request['id_matkul'],
            'tahun_akademik' => $request['tahun_akademik'] , // Menambahkan waktu default,
            'jumlah_peserta' => $request['jumlah_peserta']
        ]);


        return redirect()->route('jadwal.index')
            ->with('success', 'User "jadwal" created successfully.');
    }

    public function show(User $user)
    {
        return view('users.show', compact('user'));
    }

    public function edit(Jadwal $user)
    {
        $dosen = User::role('dosen')->get();
        return view('dashboard.jadwal.edit', compact('user', 'dosen'));
    }
    public function update(Request $request, Jadwal $user)
    {

        $user->update([
            'id_jadwal' => $request['id_jadwal'],
            'hari' => $request['hari'],
            'jam_mulai' => $request['jam_mulai'|'date_format:H:i'],
            'jam_akhir' => $request['jam_akhir'|'date_format:H:i'],
            'id_matkul' => $request['id_matkul'],
            'tahun_akademik' => $request['tahun_akademik'],
            'jumlah_peserta' => $request['jumlah_peserta']
        ]);
        return redirect()->route('jadwal.index')
            ->with('success', 'User updated successfully');
    }
    public function destroy(Jadwal $user)
    {
        $user->delete();
        return redirect()->route('jadwal.index')
            ->with('success', 'User deleted successfully');
    }

}
