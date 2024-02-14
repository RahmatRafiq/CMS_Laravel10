<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;

    protected $table = 'produk';
    protected $primaryKey = 'id';

    protected $fillable = [
        // 'kategori_id',
        'sub_kategori_id',
        'description',
        'kode_produk',
        'otomatis',
        'notes',
        'poin',
        'price',
        'stok',
        'image_produk'

    ];

    public function kategori(){
        return $this->belongsTo(Kategori::class, 'kategori_id', 'id');
    }
    public function subkategori(){
        return $this->belongsTo(SubKategori::class, 'sub_kategori_id', 'id');
    }

    public function getAutoAttribute(){
        if ($this->otomatis) {
            return '<span class="badge light badge-success">
                        <i class="fa fa-circle text-success mr-1"></i>
                        Active
                    </span>';
        } else {
            return '<span class="badge light badge-danger">
                        <i class="fa fa-circle text-danger mr-1"></i>
                        Non-Active
                    </span>';
        }
    }

	/**
	 * @return mixed
	 */
	public function getFillable() {
		return $this->fillable;
	}

	/**
	 * @param mixed $fillable
	 * @return self
	 */
	public function setFillable($fillable): self {
		$this->fillable = $fillable;
		return $this;
	}
}
