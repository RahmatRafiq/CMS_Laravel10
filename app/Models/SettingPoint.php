<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SettingPoint extends Model
{
    use HasFactory;

    protected $table = 'setting_poin';
    protected $primaryKey = 'id';

    protected $fillable = [
        'title',
        'poin',
    ];
}
