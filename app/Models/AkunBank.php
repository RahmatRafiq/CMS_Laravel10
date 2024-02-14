<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AkunBank extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = "akun_bank";

    protected $fillable = [
        'nama_bank',
        'no_rekening',
        'atas_nama',
        'image',
        'qris',
        'has_active',
        'for_topup',
        'for_all',
        'must_kyc'
    ];
}
