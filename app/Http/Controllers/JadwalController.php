<?php

namespace App\Http\Controllers;

use App\Models\Jadwal;
use App\Models\Matakuliah;
use App\Models\Perserta;
use App\Models\User;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;

class JadwalController extends Controller
{
    public function index()
    {
        $datajadwal = Jadwal::all();
        return view('dashboard.jadwal.index', compact('datajadwal'));
    }

    public function create()
    {
        $matkul = Matakuliah::all();
        return view('dashboard.jadwal.create',compact('matkul'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'hari' => 'required|string',
            'tanggal' => 'required',
            'jam_mulai' => 'required|date_format:H:i',
            'jam_akhir' => 'required|date_format:H:i',
            'id_matkul' => 'required',
            'tahun_akademik' => 'required'
        ]);

        Jadwal::create([
            'hari' => $request['hari'],
            'tanggal' => $request['tanggal'],
            'jam_mulai' => $request['jam_mulai'],
            'jam_akhir' => $request['jam_akhir'],
            'id_matkul' => $request['id_matkul'],
            'tahun_akademik' => $request['tahun_akademik']
        ]);

        return redirect()->route('jadwal.index')
            ->with('success', 'Jadwal created successfully.');
    }

    public function show($id)
    {
        $dataPerserta = Perserta::all()->where('id_matkul', $id);
        return view('dashboard.perserta.show', compact('dataPerserta'));
    }

    public function edit(Jadwal $user)
    {

        $matkul = Matakuliah::all();
        return view('dashboard.jadwal.edit', compact('user', 'matkul'));
    }

    public function update(Request $request, Jadwal $user)
    {

        $user->update([
            'hari' => $request['hari'],
            'tanggal' => $request['tanggal'],
            'jam_mulai' => $request['jam_mulai'],
            'jam_akhir' => $request['jam_akhir'],
            'id_matkul' => $request['id_matkul'],
            'tahun_akademik' => $request['tahun_akademik']
        ]);

        return redirect()->route('jadwal.index')
            ->with('success', 'Jadwal updated successfully');
    }

    public function destroy(Jadwal $user)
    {
        $user->delete();
        return redirect()->route('jadwal.index')
            ->with('success', 'Jadwal deleted successfully');
    }

    public function generateQRCodeIn($id)
    {
        $jadwal = Jadwal::findOrFail($id);

        // URL endpoint untuk scan QR Code
        $url = URL::route('peserta.scan-qr-code', ['id' => $jadwal->id]);

        // Generate QR Code dengan link endpoint
        $qrcode = QrCode::size(200)->generate($url);

        return view('dashboard.jadwal.qrcode', compact('qrcode', 'jadwal'));
    }

    public function generateQRCodeOut($id)
    {
        $jadwal = Jadwal::findOrFail($id);

        // URL endpoint untuk scan QR Code
        $url = URL::route('peserta.keluar.scan-qr-code', ['id' => $jadwal->id]);

        // Generate QR Code dengan link endpoint
        $qrcode = QrCode::size(200)->generate($url);

        return view('dashboard.jadwal.qrcodeOut', compact('qrcode', 'jadwal'));
    }

    public function buka_kelas()
    {
        // Get the authenticated user (assuming it's a dosen)
        $dosen = auth()->user();

        // Query jadwal based on matakuliah where dosen_id is the authenticated user
        $datajadwal = Jadwal::whereHas('matakuliah', function ($query) use ($dosen) {
            $query->where('nidn_id', $dosen->username);
        })->get();

        return view('dashboard.jadwal.index', compact('datajadwal'));
    }
}
