<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kegiatanModel extends Model
{
    use HasFactory;
    protected $table = 'tb_kegiatan_absensi';
    protected $fillable = [
        'id',
        'nama_kegiatan',
        'tanggal',
        'jam_mulai',
        'jam_selesai',
        'deskripsi',
        'foto',
        'created_at',
        'update_at'
    ];
}
