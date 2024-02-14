<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImageMemberStatus extends Model
{
    use HasFactory;

    protected $table = 'produk_member_status_image';

    protected $fillable = [
        'id_produk_member_status',
        'gambar',
        'status',

    ];

    public function produkmemberstatus()
    {
        return $this->belongsTo(ProdukMemberStatus::class, 'id_produk_member_status', 'id');
    }

    public function memberstatus()
    {
        return $this->belongsTo(MemberStatus::class, 'id_member_status', 'id');
    }

}
