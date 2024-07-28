<?php

namespace App\Http\Controllers;

use App\Models\Absensi;
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


    public function RiwayatDsn()
    {
        // Logika untuk menangani riwayat presensi
        return view('dashboard.Riwayat.riwayat_presensidsn');
    }
}
