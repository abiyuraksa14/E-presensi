<?php

namespace App\Http\Controllers;

use App\Models\Jadwal;
use App\Models\User;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
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

        Jadwal::create([
            'id_jadwal' => $request['id_jadwal'],
            'hari' => $request['hari'],
            'jam_mulai' => $request['jam_mulai'],
            'jam_akhir' => $request['jam_akhir'],
            'id_matkul' => $request['id_matkul'],
            'tahun_akademik' => $request['tahun_akademik'],
            'jumlah_peserta' => $request['jumlah_peserta']
        ]);

        return redirect()->route('jadwal.index')
            ->with('success', 'Jadwal created successfully.');
    }

    public function show(user $user)
    {
        return view('dashboard.jadwal.show', compact('user'));
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
            'jam_mulai' => $request['jam_mulai'],
            'jam_akhir' => $request['jam_akhir'],
            'id_matkul' => $request['id_matkul'],
            'tahun_akademik' => $request['tahun_akademik'],
            'jumlah_peserta' => $request['jumlah_peserta']
        ]);

        return redirect()->route('data-jadwal.index')
            ->with('success', 'Jadwal updated successfully');
    }

    public function destroy(Jadwal $user)
    {
        $user->delete();
        return redirect()->route('data-jadwal.index')
            ->with('success', 'Jadwal deleted successfully');
    }

    public function generateQRCode($id)
    {
        $jadwal = Jadwal::findOrFail($id);
        $data = [
            'id' => $jadwal->id,
            'hari' => $jadwal->hari,
            'jam_mulai' => $jadwal->jam_mulai,
            'jam_akhir' => $jadwal->jam_akhir,
            'id_matkul' => $jadwal->id_matkul,
            'tahun_akademik' => $jadwal->tahun_akademik,
            'jumlah_peserta' => $jadwal->jumlah_peserta
        ];

        $qrcode = QrCode::size(200)->generate(json_encode($data));

        return view('dashboard.jadwal.qrcode', compact('qrcode'));
    }
}
