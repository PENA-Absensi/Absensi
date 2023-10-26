<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class memberModel extends Model
{
    use HasFactory;
    protected $table = 'tb_member';
    protected $fillable = [
        'id',
        'nama',
        'alamat',
        'jurusan',
        'gen',
        'no_registrasi',
        'angkatan',
        'created_at',
        'update_at'
    ];
}
