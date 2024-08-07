<?php

namespace App\Http\Controllers;

use App\Models\Absensi;
use App\Models\DosenAbsensi;
use App\Models\Matakuliah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RiwayatPresensiController extends Controller
{
    public function RiwayatMhs()
    {
        // Logika untuk menangani riwayat presensi
        $datas = Absensi::all()->where('id_peserta', Auth::user()->id);
        return view('dashboard.Riwayat.riwayat_presensi_mhs', compact('datas'));
    }

    public function RiwayatMhsMatkul()
    {
        // Dapatkan ID dosen yang sedang login
        $dosenId = Auth::user()->username;

        // Debug: Periksa ID dosen yang sedang login
        // dd($dosenId);

        // Dapatkan semua mata kuliah yang diampu oleh dosen yang sedang login
        $matkulIds = Matakuliah::where('nidn_id', $dosenId)->pluck('kd_matkul');

        // Debug: Periksa kd_matkul yang diampu oleh dosen
        // dd($matkulIds);

        // Filter data absensi berdasarkan id_matkul yang diampu oleh dosen yang sedang login
        $datas = Absensi::whereIn('id_matkul', $matkulIds)->get();

        // Debug: Periksa data absensi yang diambil
        // dd($datas);

        return view('dashboard.Riwayat.riwayat_presensi_mhs', compact('datas'));
    }



    public function RiwayatDsn()
    {
        // Logika untuk menangani riwayat presensi
        $datas = DosenAbsensi::all()->where('id_dosen', Auth::user()->id);
        return view('dashboard.Riwayat.riwayat_presensi_dsn', compact('datas'));
    }

    public function RiwayatMhsAll()
    {
        // Logika untuk menangani riwayat presensi
        $datas = Absensi::all();
        return view('dashboard.Riwayat.riwayat_presensi_mhs', compact('datas'));
    }
    public function RiwayatDsnAll()
    {
        // Logika untuk menangani riwayat presensi
        $datas = DosenAbsensi::all();
        return view('dashboard.Riwayat.riwayat_presensi_dsn', compact('datas'));
    }

    public function Riwayatfill()
    {
        {
            $datas = Absensi::with('user', 'matakuliah');

            if ($datas->has('name') && $datas->name != '') {
                $datas->whereHas('user', function($q) use ($datas) {
                    $q->where('name', 'like', '%' . $datas->name . '%');
                });
            }

            if ($datas->has('id_matkul') && $datas->id_matkul != '') {
                $datas->where('id_matkul', $datas->id_matkul);
            }

            $datas = $datas->get();

            return view('dashboard.Riwayat.riwayat_presensi_mhs', compact('datas'));
        }
    }

}
