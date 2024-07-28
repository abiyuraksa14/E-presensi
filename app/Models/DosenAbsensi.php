<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DosenAbsensi extends Model
{
    use HasFactory;

    protected $table = 'dosen_absensis';

    protected $fillable = [
        'id_dosen', 'id_jadwal', 'id_matakuliah', 'tanggal_absen', 'waktu_absen_masuk', 'waktu_absen_keluar'
    ];

    public function dosen()
    {
        return $this->belongsTo(User::class, 'id_dosen');
    }

    public function jadwal()
    {
        return $this->belongsTo(Jadwal::class, 'id_jadwal');
    }

    public function matakuliah()
    {
        return $this->belongsTo(Matakuliah::class, 'id_matakuliah', 'kd_matkul');
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

    public function getWaktuAbsenMasukFormattedAttribute()
    {
        return Carbon::parse($this->waktu_absen_masuk)->format('H:i');
    }

    public function getWaktuAbsenKeluarFormattedAttribute()
    {
        return $this->waktu_absen_keluar ? Carbon::parse($this->waktu_absen_keluar)->format('H:i') : 'Belum absen keluar';
    }
}
