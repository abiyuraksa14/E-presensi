<?php

namespace App\Http\Controllers;

use App\Models\Absensi;
use App\Models\DosenAbsensi;
use App\Models\Jadwal;
use App\Models\Matakuliah;
use App\Models\Perserta;
use App\Models\User;
use Carbon\Carbon;
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
        return view('dashboard.jadwal.create', compact('matkul'));
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

        // Ensure the authenticated user is a valid dosen for the Matakuliah associated with the Jadwal
        $user = auth()->user();

        // Generate QR Code dengan link endpoint
        $qrcode = QrCode::size(200)->generate($url);

        // Example: check if the dosen already did the absensi for this jadwal today
        $existingAbsensi = DosenAbsensi::where('id_jadwal', $id)
            ->where('id_dosen', $user->id)
            ->whereDate('tanggal_absen', Carbon::today())
            ->exists();

        if ($existingAbsensi) {
            return view('dashboard.jadwal.qrcode', compact('qrcode', 'jadwal'))->with('error', 'Anda sudah melakukan absensi untuk jadwal ini hari ini.');
        }

        // Create new DosenAbsensi record
        $absensi = new DosenAbsensi();
        $absensi->id_dosen = $user->id;
        $absensi->id_jadwal = $id;
        $absensi->id_matakuliah = $jadwal->matakuliah->kd_matkul;
        $absensi->tanggal_absen = Carbon::now()->toDateString();
        $absensi->waktu_absen_masuk = Carbon::now();
        $absensi->save();



        return view('dashboard.jadwal.qrcode', compact('qrcode', 'jadwal'))->with('success', 'Berhasil membuka kelas.');
    }

    public function generateQRCodeOut($id)
    {
        $jadwal = Jadwal::findOrFail($id);

        // Ensure the authenticated user is a valid dosen for the Matakuliah associated with the Jadwal
        $user = auth()->user();

        // URL endpoint untuk scan QR Code
        $url = URL::route('peserta.keluar.scan-qr-code', ['id' => $jadwal->id]);

        // Generate QR Code dengan link endpoint
        $qrcode = QrCode::size(200)->generate($url);

        // Check if the dosen already did the absensi out (waktu_absen_keluar) for this jadwal today
        $existingAbsensiOut = DosenAbsensi::where('id_jadwal', $id)
            ->where('id_dosen', $user->id)
            ->whereDate('tanggal_absen', Carbon::today())
            ->whereNotNull('waktu_absen_keluar')
            ->exists();

        if ($existingAbsensiOut) {
            return view('dashboard.jadwal.qrcodeOut', compact('qrcode', 'jadwal'))
                ->with('error', 'Anda sudah melakukan absensi keluar untuk jadwal ini hari ini.');
        }

        // Update existing Absensi record with waktu_absen_keluar
        $absensi = DosenAbsensi::where('id_jadwal', $id)
            ->where('id_dosen', $user->id)
            ->whereDate('tanggal_absen', Carbon::today())
            ->first();

        // Check if waktu_absen_keluar is already set
        if (!$absensi->waktu_absen_keluar) {
            $absensi->waktu_absen_keluar = Carbon::now();
            $absensi->save();
        }

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
