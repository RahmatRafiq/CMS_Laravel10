<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FlashSale extends Model
{
    use HasFactory;

    protected $table = 'produk_flash_sale';

    protected $fillable = [
        'produk_id',
        'price_sale',
        'date_sale',
        'total_transaksi',
        'kuota_transaksi',
        'is_active',
        'time_sale',
        'type',
        'image',
    ];

    public function produk()
    {
        return $this->belongsTo(Produk::class, 'produk_id', 'id');
    }
}
