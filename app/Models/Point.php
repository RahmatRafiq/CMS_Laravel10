<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Point extends Model
{
    use HasFactory;

    protected $table = 'point';

    protected $fillable = [
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

    public function member(){
        return $this->belongsTo(Member::class, 'member_id', 'id');
    }

    public function downline_member(){
        return $this->belongsTo(Member::class, 'downline_member_id', 'id');
    }
}
