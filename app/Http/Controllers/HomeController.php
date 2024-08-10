<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Absensi;
use App\Models\Perserta;
use App\Models\Matakuliah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;



class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function grafik(Request $request)
    {
        $user = Auth::user();
        $roles = $user->roles->pluck('name');
        $mhs = User::role('mahasiswa')->count();
        $dsn = User::role('dosen')->count();
        $allAbsensi = Absensi::all();

        // Mengambil data semester dari jadwal
        $semesters = 'knt';

        $labels = $allAbsensi->pluck('nama_mahasiswa')->unique();
        $dataDurasi = $labels->map(function ($label) use ($allAbsensi) {
            return $allAbsensi->where('nama_mahasiswa', $label)->sum('durasi_presensi');
        });

        $matakuliahId = $request->input('matakuliah');
        $pesertaId = $request->input('peserta');

        // Query dengan filter berdasarkan matakuliah dan peserta
        $query = Absensi::query();

        if ($matakuliahId) {
            $query->where('id_matkul', $matakuliahId);
        }

        if ($pesertaId) {
            $query->where('id_peserta', $pesertaId);
        }

        $absensis = $query->get();

        $labels = $absensis->map(function ($absensi) {
            return $absensi->user->name; // Asumsikan ada field `name` pada model `Peserta`
        });

        $dataDurasi = $absensis->map(function ($absensi) {
            return $absensi->durasi;
        });

        $matakuliahList = Matakuliah::all();
        $pesertaList = Perserta::all();
        return view('home', compact('roles', 'mhs', 'dsn', 'labels', 'dataDurasi', 'semesters', 'labels', 'dataDurasi', 'matakuliahList', 'pesertaList'));
    }
}
