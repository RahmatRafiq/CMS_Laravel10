<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Models\Transaksi;

class DashboardController extends Controller
{
    public function index()
    {

        $membersThisMonth = Member::getMemberPerBulan();
        $produk_terlaris = Transaksi::getTotalTransaksiLimit(10);
        $member = Member::count();
        $compareData = Transaksi::compareTransactions();

        return view('cms.home.home', [
            'member' => $member,
            'produk_terlaris' => $produk_terlaris,
            'saldo_tripay' => 0,
            'total_redeem' => 0,
            'transactionsThisMonth' => $compareData['transactionsThisMonth'],
            'transactionsLastMonth' => $compareData['transactionsLastMonth'],
            'membersThisMonth' => $membersThisMonth,

        ]);

    }
}
