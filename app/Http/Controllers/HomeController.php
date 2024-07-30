<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Absensi;
use App\Models\Matakuliah;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;



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
    public function index()
    {
        // $user = User::all()->count();
        // $mhs = User::role('mahasiswa')->count();
        // // $dsn = User::role('dosen')->count();

        // // Mengambil data durasi absensi per mata kuliah
        // $absensiData = Absensi::select('id_matakuliah', DB::raw('SUM(DATEDIFF(MINUTE, waktu_absen_masuk, waktu_absen_keluar)) as total_durasi'))
        //     ->groupBy('id_matakuliah')
        //     ->get();

        // $labels = [];
        // $totals = [];

        // foreach ($absensiData as $item) {
        //     $matakuliah = Matakuliah::find($item->id_matakuliah);
        //     if ($matakuliah) {
        //         $labels[] = $matakuliah->nama_matkul;
        //         $totals[] = $item->total_durasi;
        //     }
        // }

        // return view('home', compact('mhs', 'dsn', 'labels', 'totals'));

        $mhs = User::role('mahasiswa')->count();
        return view('home', compact('mahasiswa'));
    }
}
