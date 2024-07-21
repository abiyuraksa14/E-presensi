<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Jadwal extends Model
{
        use HasFactory;

        protected $table = 'jadwals';

        protected $fillable = [
            'hari','tanggal', 'jam_mulai', 'jam_akhir', 'id_matkul', 'tahun_akademik'
        ];

        public function matakuliah()
        {
            return $this->belongsTo(Matakuliah::class, 'id_matkul', 'kd_matkul');
        }

        // Definisikan accessor untuk mendapatkan jumlah peserta
        public function getJumlahPesertaAttribute()
        {
            return $this->peserta()->count();
        }

        // Relasi ke tabel peserta melalui matakuliah
        public function peserta()
        {
            return $this->hasManyThrough(
                Perserta::class,
                Matakuliah::class,
                'kd_matkul', // Foreign key dari Matakuliah ke Jadwal
                'id_matkul', // Foreign key dari Peserta ke Matakuliah
                'id_matkul', // Lokal key dari Jadwal
                'kd_matkul' // Lokal key dari Matakuliah
            );
        }

        public function dosen()
    {
        return $this->matakuliah->dosen(); // Assuming you have a relationship to the dosen in Matakuliah model
    }
    }
