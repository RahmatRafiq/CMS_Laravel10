<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PointTransaksi extends Model
{
    use HasFactory;

    protected $table = 'point';

    protected $fillable = [
        'id',
        'member_id',
        'downline_member_id',
        'description',
        'point',
        'type_point',
        'type',
        'point_akhir',
        'jumlah_saldo',
        'idtransaksi',
    ];
}
