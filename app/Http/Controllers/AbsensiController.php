<?php

namespace App\Http\Controllers;

use App\Models\Absensi;
use App\Models\Jadwal;
use App\Models\Perserta;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AbsensiController extends Controller
{
    public function index()
    {
        $absensis = Absensi::all();
        return view('dashboard.absensi.index', compact('absensis'));
    }

    public function create()
    {
        // Logika untuk menampilkan form pembuatan absensi
    }

    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'peserta_id' => 'required',
            'jadwal_id' => 'required',
            'matakuliah_id' => 'required',
            'tanggal_absen' => 'required',
            // Sesuaikan validasi untuk waktu absen masuk dan keluar jika diperlukan
        ]);

        // Simpan data absensi
        Absensi::create($request->all());

        return redirect()->route('absensi.index')
            ->with('success', 'Absensi berhasil disimpan.');
    }

    public function show($id)
    {
        $absensi = Absensi::findOrFail($id);
        return view('absensi.show', compact('absensi'));
    }

    public function edit($id)
    {
        $absensi = Absensi::findOrFail($id);
        return view('absensi.edit', compact('absensi'));
    }

    public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'peserta_id' => 'required',
            'jadwal_id' => 'required',
            'matakuliah_id' => 'required',
            'tanggal_absen' => 'required',
            // Sesuaikan validasi untuk waktu absen masuk dan keluar jika diperlukan
        ]);

        // Update data absensi
        $absensi = Absensi::findOrFail($id);
        $absensi->update($request->all());

        return redirect()->route('absensi.index')
            ->with('success', 'Absensi berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $absensi = Absensi::findOrFail($id);
        $absensi->delete();

        return redirect()->route('absensi.index')
            ->with('success', 'Absensi berhasil dihapus.');
    }

    public function absenMasuk($id)
    {
        $absensi = Absensi::findOrFail($id);

        // Validasi jika sudah pernah absen masuk sebelumnya
        if ($absensi->waktu_absen_masuk !== null) {
            return redirect()->back()->with('error', 'Anda sudah melakukan absensi masuk sebelumnya.');
        }

        // Lakukan absen masuk
        $absensi->waktu_absen_masuk = Carbon::now();
        $absensi->save();

        return redirect()->back()->with('success', 'Absensi masuk berhasil.');
    }

    public function absenKeluar($id)
    {
        $absensi = Absensi::findOrFail($id);

        // Validasi jika belum absen masuk
        if ($absensi->waktu_absen_masuk === null) {
            return redirect()->back()->with('error', 'Anda harus melakukan absensi masuk terlebih dahulu.');
        }

        // Validasi jika sudah pernah absen keluar sebelumnya
        if ($absensi->waktu_absen_keluar !== null) {
            return redirect()->back()->with('error', 'Anda sudah melakukan absensi keluar sebelumnya.');
        }

        // Lakukan absen keluar
        $absensi->waktu_absen_keluar = Carbon::now();
        $absensi->save();

        return redirect()->back()->with('success', 'Absensi keluar berhasil.');
    }

    public function scanQRCode(Request $request, $id)
    {
        // Validate request if necessary
        $request->validate([
            // Validation rules if needed
        ]);

        // Ensure the authenticated user is a valid participant in the Matakuliah associated with the Jadwal
        $user = auth()->user();
        $jadwal = Jadwal::findOrFail($id);

        // Check if the user is registered as a participant (Peserta) in the associated Matakuliah
        $isParticipant = Perserta::where('id_mahasiswa', $user->username)
                                 ->where('id_matkul', $jadwal->id_matkul)
                                 ->exists();

        if (!$isParticipant) {
            return response()->json(['message' => 'Anda belum terdaftar sebagai peserta pada matakuliah ini.'], 403);
        }

        // Example: check if the student already did the absensi for this jadwal today
        $existingAbsensi = Absensi::where('id_jadwal', $id)
                                  ->where('id_peserta', $user->id) // Filter by authenticated user
                                  ->whereDate('tanggal_absen', Carbon::today())
                                  ->exists();

        if ($existingAbsensi) {
            return response()->json(['message' => 'Anda sudah melakukan absensi untuk jadwal ini hari ini.'], 422);
        }

        // Create new Absensi record
        $absensi = new Absensi();
        $absensi->id_peserta = $user->id; // Use the authenticated user's ID as the Peserta ID
        $absensi->id_jadwal = $id;
        $absensi->id_matkul = $jadwal->matakuliah->kd_matkul;
        $absensi->tanggal_absen = Carbon::now()->toDateString();
        $absensi->waktu_absen_masuk = Carbon::now(); // You can adjust this as needed
        $absensi->save();

        return response()->json(['message' => 'Absensi berhasil.'], 200);
    }

}
