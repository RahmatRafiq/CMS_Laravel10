<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;

    protected $fillable = [
        'username',
        'email',
        'saldo',
        'phone',
        'address',
        'nama_lengkap',
        'gender',
        'verifikasi',
        'otp',
        'status_user',
        'poin',
        'id_atas',
        'kode_referral',
        'status_member',
        'date_premium',
        'verifikasi',
        'pin',
        'token_notif',
        'total_masukan_pin',
        'date_gerate_otp',
        'token_regis',
        'pos_user',
        'is_kyc',
        'failed_pass',
        'last_failed_pass',
        'isDisabled',
        'remember_token',
    ];

    protected $hidden = [
        'password',
    ];

    public function bannedMember()
    {
        return $this->hasOne(BannedMember::class, 'member_id', 'id');
    }

    public function member()
    {
        return $this->belongsTo(Member::class, 'member_id', 'id');
    }

    public static function getMemberPerBulan()
    {
        // $currentMonth = Carbon::now()->format('m');
        // $currentYear = Carbon::now()->format('Y');

        // return self::whereMonth('created_at', '=', $currentMonth)
        //     ->whereYear('created_at', '=', $currentYear)
        //     ->get();

        $membersThisMonth = Member::whereMonth('created_at', now()->month)
            ->whereYear('created_at', now()->year)
            ->count();

        return $membersThisMonth;

    }
}
