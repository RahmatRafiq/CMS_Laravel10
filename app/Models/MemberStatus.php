<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MemberStatus extends Model
{
    use HasFactory;

    protected $table = 'member_status';
    protected $primaryKey = 'id';

    protected $fillable = [
        'status_code',
        'status_name',
    ];

    public function produkmemberstatus()
    {
        return $this->hasMany(ProdukMemberStatus::class, 'id_member_status', 'id');
    }

}
