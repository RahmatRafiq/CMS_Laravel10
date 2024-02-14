<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MutasiAdmin extends Model
{
    use HasFactory;

    protected $table = 'mutasi_admin';
    protected $fillable = [
        "member_id",
        "nominal",
        "admin_email",
        "lunas",
        "keterangan",
        "id_transaksi"
    ];
}
