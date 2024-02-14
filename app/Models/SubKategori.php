<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SubKategori extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'sub_kategori';
    protected $primaryKey = 'id';

    protected $fillable = [
        'kategori_id',
        'name',
        'server',
        'image',

    ];
    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'kategori_id', 'id');
    }

    public function produk()
    {
        return $this->hasMany(Produk::class, 'sub_kategori_id', 'id');
    }

}
