<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class Transaksi extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'transaksi';

    protected $fillable = [
        'member_id',
        'payment_method',
        'payment_status',
        'price',
        'id_pelanggan',
        'kode_unik',
        'produk_description',
        'produk_notes',
        'sub_kategori',
        'kategori',
        'phone',
        'no_transaksi',
        'status_pengisian',
        'type_transaksi',
        'serial_number',
        'otomatis',
        'kode_produk',
        'status_server',
        'status_server_code',
        'price_server',
        'asal_server',
        'poin',
        'reference_tripay',
        'pay_code_tripay',
        'instruksi_tripay',
        'id_tripay',
        'qris',
        'partner_name',
        'va_id',
        'qris_id',
        'biaya_admin',
        'potongan_admin',
    ];

    public static function getTotalTransaksiLimit($limit)
    {
        return DB::table('transaksi')->select(DB::raw('count(produk_description) as total'), 'produk_description')
            ->groupBy('produk_description')
            ->orderBy('total', 'desc')
            ->limit($limit)
            ->get();
    }
    public static function compareTransactions()
    {
        $startDateLastMonth = now()->subMonth()->startOfMonth();
        $endDateLastMonth = now()->subMonth()->endOfMonth();

        $startDateThisMonth = now()->startOfMonth();
        $endDateThisMonth = now()->endOfMonth();

        $transactionsLastMonth = self::select(DB::raw('DATE(created_at) as date'), DB::raw('COUNT(id) as count'))
            ->whereBetween('created_at', [$startDateLastMonth, $endDateLastMonth])
            ->groupBy(DB::raw('DATE(created_at)'))
            ->get();

        $transactionsThisMonth = self::select(DB::raw('DATE(created_at) as date'), DB::raw('COUNT(id) as count'))
            ->whereBetween('created_at', [$startDateThisMonth, $endDateThisMonth])
            ->groupBy(DB::raw('DATE(created_at)'))
            ->get();

        return [
            'transactionsThisMonth' => $transactionsThisMonth,
            'transactionsLastMonth' => $transactionsLastMonth,
        ];
    }

    public function member(){
        return $this->belongsTo(Member::class, 'member_id', 'id');
    }
}
