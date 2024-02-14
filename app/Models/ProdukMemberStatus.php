<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProdukMemberStatus extends Model
{
    use HasFactory;

    protected $table = 'produk_member_status';

    protected $fillable = [
        'id_member_status',
        'day_active',
        'day_active',
        'status',
        'id_produk',
    ];

    public function produk()
    {
        return $this->belongsTo(Produk::class, 'id_produk', 'id');
    }

    public function memberstatus()
    {
        return $this->belongsTo(MemberStatus::class, 'id_member_status', 'id');
    }
}
