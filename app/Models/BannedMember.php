<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BannedMember extends Model
{
    use HasFactory;

    protected $table = 'user_banned';

    protected $primaryKey = 'id';

    protected $fillable = [
        'member_id',
        'reason',
        'updated_at',
    ];

    public function member()
    {
        return $this->belongsTo(Member::class, 'member_id', 'id');
    }
}
