<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;

    protected $table = 'barang';

    protected $fillable = [
        'image',
        'judul',
        'harga',
        'deskripsi',
        'deskripsi_tmbnl',
        'dukungan_kirim',
        'stok',
        'warna'
    ];
}
