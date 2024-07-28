<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Matakuliah extends Model
{
    use HasFactory;

    protected $table = 'matakuliahs';

    protected $primaryKey = 'kd_matkul';
    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = [
        'kd_matkul', 'nama_matkul', 'sks', 'semester', 'durasi', 'nidn_id'
    ];

    public function dosen()
    {
        return $this->belongsTo(User::class, 'nidn_id', 'username');
    }

    public function peserta()
    {
        return $this->hasMany(Perserta::class, 'matakuliah_id', 'kd_matkul');
    }

    public function jadwal()
    {
        return $this->hasMany(Jadwal::class, 'id_matkul', 'kd_matkul');
    }

    public function absensis()
    {
        return $this->hasMany(Absensi::class, 'id_matakuliah', 'kd_matkul');
    }
}
