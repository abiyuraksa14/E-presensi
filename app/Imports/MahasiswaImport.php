<?php

namespace App\Imports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Facades\Hash;

class MahasiswaImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        // Cek apakah mahasiswa sudah ada berdasarkan username atau email
        $mahasiswa = User::firstOrNew(['username' => $row['username']]);

        // Set data mahasiswa
        $mahasiswa->name = $row['name'];
        $mahasiswa->email = $row['email'];
        $mahasiswa->password = Hash::make($row['password']); // Gunakan Hash::make() untuk mengenkripsi password
        $mahasiswa->email_verified_at = null; // Atur email_verified_at sesuai kebutuhan
        $mahasiswa->remember_token = null; // Atur remember_token sesuai kebutuhan
        $mahasiswa->created_at = now();
        $mahasiswa->updated_at = now();

        // Simpan mahasiswa
        $mahasiswa->save();

        // Assign role 'mahasiswa' ke mahasiswa yang baru dibuat
        $mahasiswa->assignRole('mahasiswa');

        return $mahasiswa;
    }
}
