<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Kategori extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'kategori';
    protected $primaryKey = 'id';

    protected $fillable = [
        'name',
        'image',
        'view_pelanggan_id',
    ];

    public function subKategori()
    {
        return $this->hasMany(SubKategori::class, 'kategori_id', 'id');
    }
}
