<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriProvider extends Model
{
    use HasFactory;

    use HasFactory;

    protected $table = 'kategori_provider';
    protected $primaryKey = 'id';

    public $timestamps = false;

    protected $fillable = [
        'kategori_id',
        'provider_id',

    ]; 
    public function kategori(){
        return $this->belongsTo(Kategori::class, 'kategori_id', 'id');
    }

    public function provider(){
        return $this->belongsTo(Provider::class, 'provider_id', 'id');
    }
}
