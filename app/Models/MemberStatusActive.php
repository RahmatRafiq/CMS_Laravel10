<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MemberStatusActive extends Model
{
    use HasFactory;

    protected $table = 'member_status_active';
    protected $primaryKey = 'id';

    protected $fillable = [
        'member_id',
        'start_active',
        'end_active',
        'id_member_status',
    ];
    public function member()
    {
        return $this->belongsTo(Member::class, 'member_id', 'id');
    }
    public function member_status()
    {
        return $this->belongsTo(MemberStatus::class, 'id_member_status', 'id');
    }
}
