<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AlteraPdam extends Model
{
    use HasFactory;

    protected $table = 'altera_pdam';
    protected $primaryKey = 'id';

    protected $fillable = [
        'code',
        'description',
        'admin',
        'poin',
        'produk_notes',
    ];
}
