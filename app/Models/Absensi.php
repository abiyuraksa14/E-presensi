<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Absensi extends Model
{
    use HasFactory;

    protected $table = 'absensis';

    protected $fillable = [
        'id_peserta', 'id_jadwal', 'id_matakuliah', 'tanggal_absen', 'waktu_absen_masuk', 'waktu_absen_keluar', 'keterangan'
    ];

    public function peserta()
    {
        return $this->belongsTo(Perserta::class);
    }

    public function jadwal()
    {
        return $this->belongsTo(Jadwal::class);
    }

    public function matakuliah()
    {
        return $this->belongsTo(Matakuliah::class);
    }
}
