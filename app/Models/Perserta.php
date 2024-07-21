<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perserta extends Model
{
    use HasFactory;

    protected $table = 'persertas';

    protected $fillable = [
        'id_matkul', 'id_mahasiswa'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_mahasiswa', 'username');
    }

    public function matakuliah()
    {
        return $this->belongsTo(Matakuliah::class, 'id_matkul', 'kd_matkul');
    }
}
