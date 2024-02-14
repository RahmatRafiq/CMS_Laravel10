<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SettingMargin extends Model
{
    use HasFactory;

    protected $table = 'setting_margin';
    protected $primaryKey = 'id';

    protected $fillable = [

        'range_start',
        'range_end',
        'margin',
        'member_type',
        'status',

    ];

}
