<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Matakuliah extends Model
{
    use HasFactory;

    protected $table = 'matakuliahs';

    protected $fillable = [
        'kd_matkul', 'nama_matkul', 'sks', 'semester', 'durasi', 'nidn_id'
    ];

    public function dosen()
    {
        return $this->belongsTo(User::class, 'nidn_id', 'username');
    }

    public function peserta()
    {
        return $this->hasMany(Perserta::class, 'matakuliah_id', 'id');
    }

    public function jadwal()
    {
        return $this->hasMany(Jadwal::class, 'id_matkul', 'id');
    }
}
