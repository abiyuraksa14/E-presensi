<?php

namespace App\Models;

use Carbon\Carbon;
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
        return $this->belongsTo(Perserta::class, 'id_peserta');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id_peserta');
    }

    public function jadwal()
    {
        return $this->belongsTo(Jadwal::class, 'id_jadwal');
    }

    public function matakuliah()
    {
        return $this->belongsTo(Matakuliah::class, 'id_matkul', 'kd_matkul');
    }

    public function getDurasiAttribute()
    {
        if ($this->waktu_absen_keluar) {
            $masuk = Carbon::parse($this->waktu_absen_masuk);
            $keluar = Carbon::parse($this->waktu_absen_keluar);
            return $keluar->diffInMinutes($masuk);
        } else {
            return null;
        }
    }

    public function getSelisihDurasiAttribute()
    {
        if ($this->durasi !== null && $this->matakuliah) {
            $durasiMatakuliah = $this->matakuliah->durasi;
            if ($this->durasi < $durasiMatakuliah) {
                return 'Belum memenuhi waktu matakuliah';
            } else {
                return 'Sudah memenuhi';
            }
        } else {
            return 'Belum absen keluar atau durasi mata kuliah tidak tersedia';
        }
    }
}
