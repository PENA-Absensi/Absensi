<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class absensiModel extends Model
{
    use HasFactory;
    protected $table = 'tb_absensi';
    protected $fillable = [
        'id',
        'status',
        'created_at',
        'update_at'
    ];
}
