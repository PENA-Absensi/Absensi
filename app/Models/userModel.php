<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class userModel extends Model
{
    use HasFactory;
    protected $table = 'tb_user';
    protected $fillable = [
        'id',
        'username',
        'password',
        'role',
        'created_at',
        'update_at',
    ];
}
