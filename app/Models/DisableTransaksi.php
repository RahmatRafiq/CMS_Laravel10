<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DisableTransaksi extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'username',
        'nama_lengkap',
        'gender',
    ];

    protected $hidden = [
        'password',
    ];

}
