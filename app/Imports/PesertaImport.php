<?php

namespace App\Imports;

use App\Models\Perserta;
use App\Models\Peserta;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class PesertaImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        // Cek apakah peserta sudah ada berdasarkan id_matkul dan id_mahasiswa
        $peserta = Perserta::where('id_matkul', $row['id_matkul'])
                          ->where('id_mahasiswa', $row['id_mahasiswa'])
                          ->first();

        // Jika peserta sudah ada, skip
        if ($peserta) {
            return null; // Mengembalikan null akan menandakan untuk mengabaikan data ini
        }

        // Jika peserta belum ada, buat peserta baru
        return new Perserta([
            'id_matkul' => $row['id_matkul'],
            'id_mahasiswa' => $row['id_mahasiswa'],
            // Tambahkan kolom lainnya sesuai kebutuhan
        ]);
    }
}
