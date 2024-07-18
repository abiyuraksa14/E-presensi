<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class ScanController extends Controller
{
    public function scanQr()
    {

        return view('dashboard.presensi.scan');// Sesuaikan dengan nama file Blade yang Anda gunakan
    }

    // public function processQr(Request $request)
    // {
    //     $jadwal_id = $request->input('jadwal_id');

    //     // Lakukan pengolahan data berdasarkan $jadwal_id
    //     // Misalnya, mencari jadwal berdasarkan ID, atau melakukan operasi lain

    //     // Contoh respons JSON
    //     return response()->json([
    //         'status' => 'success',
    //         'data' => [
    //             'jadwal_id' => $jadwal_id,
    //             'message' => 'Data jadwal berhasil diproses.'
    //         ]
    //     ]);
    // }
}
