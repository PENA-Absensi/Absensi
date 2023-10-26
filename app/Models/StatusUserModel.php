<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StatusUserModel extends Model
{
    use HasFactory;
    protected $table = 'tb_status_user';
    protected $fillable = [
        'id',
        'status',
        'created_at',
        'update_at',
    ];
}
