<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    use HasFactory;
    protected $table = 'jadwals';
    protected $fillable = [
        'hari', 'jam_mulai', 'jam_akhir', 'id_matkul', 'tahun_akademik', 'jumlah_peserta'
    ];

    public function matakuliah()
    {
        return $this->belongsTo(Matakuliah::class, 'id_matkul', 'id');
    }
}
