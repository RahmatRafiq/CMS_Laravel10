<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubKategoriProvider extends Model
{
    use HasFactory;

    protected $table = 'sub_kategori_provider';
    protected $primaryKey = 'id';

    protected $fillable = [
        'sub_kategori_id',
        'provider_id',
    ]; 

    public $timestamps = false;

    public function sub_kategori(){
        return $this->belongsTo(SubKategori::class, 'sub_kategori_id', 'id');
    }

    public function provider(){
        return $this->belongsTo(Provider::class, 'provider_id', 'id');
    }
}
