<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use DB;
use Illuminate\Http\Request;
use Validator;

class TransaksiRealtimeController extends Controller
{
    public function index(Request $request)
    {
        $date = $request->query('tanggal') ? $request->query('tanggal') : date('Y-m-d');
        $date_end = $request->query('tanggal_end');

        if (isset($date) && isset($date_end) && ((strtotime($date)) > strtotime($date_end))) {
            return redirect()->back()->with(['message' => 'tanggal terbalik', 'alert' => 'danger']);
        }

        $month = isset($_GET['bulan']) ? $_GET['bulan'] : date('m');
        $year = isset($_GET['tahun']) ? $_GET['tahun'] : date('Y');
        $variable = Transaksi::
            where('status_server_code', '=', 20)
            ->whereRaw("(type_transaksi = 'Transaksi'
                                OR type_transaksi = 'Transfer Bank')")
            ->whereMonth('created_at', $month)
            ->whereYear('created_at', $year)
            ->get();
        $labaBulan = DB::select('SELECT SUM(price)-sum(price_server) AS laba FROM transaksi
            WHERE status_pengisian="berhasil"
            AND (type_transaksi = "Transaksi" OR type_transaksi = "Transfer Bank")
            AND price_server>0'
            . ' AND (DATE(created_at) BETWEEN "' . $date . '" AND ' . (isset($date_end) ? '"' . $date_end . '"' : 'NOW()') . ')'
        );
        $transaksiBulan = DB::select('SELECT SUM(price) as price,sum(price_server) AS price_server FROM transaksi
            WHERE status_pengisian="berhasil"
            AND (type_transaksi = "Transaksi" OR type_transaksi = "Transfer Bank")'
            . ' AND (DATE(created_at) BETWEEN "' . $date . '" AND ' . (isset($date_end) ? '"' . $date_end . '"' : 'NOW()') . ')'
        );

        // dd($transaksiBulan);

        $labaSeluruh = DB::select('SELECT SUM(price)-sum(price_server) AS laba FROM transaksi WHERE status_pengisian="berhasil" AND (type_transaksi = "Transaksi" OR type_transaksi = "Transfer Bank") AND price_server>0');
        $potonganadmin = DB::select("
        SELECT
        SUM(biaya_admin) as potongan_admin_transaksi
        FROM
        transaksi
        WHERE

          status_pengisian = 'berhasil' and type_transaksi = 'Topup' AND
          MONTH(created_at) = :month AND
          YEAR(created_at) = :year",
            ['month' => $month, 'year' => $year]
        );

        $bulan = array(
            '01' => 'Januari',
            '02' => 'Februari',
            '03' => 'Maret',
            '04' => 'April',
            '05' => 'Mei',
            '06' => 'Juni',
            '07' => 'Juli',
            '08' => 'Agustus',
            '09' => 'September',
            '10' => 'Oktober',
            '11' => 'November',
            '12' => 'Desember',
        );
        $keyword = isset($_GET['cari']) ? $_GET['cari'] : '';
        $trans = DB::table('transaksi')
            ->select(
                'transaksi.id as id',
                'transaksi.no_transaksi',
                'members.username',
                'members.nama_lengkap',
                //decky
                'members.email',
                //decky
                'members.saldo',
                //decky
                'transaksi.serial_number',
                'akun_bank.nama_bank',
                'transaksi.status_pengisian',
                'transaksi.price',
                'transaksi.price_server',
                'transaksi.created_at',
                'transaksi.phone',
                'transaksi.sub_kategori',
                'transaksi.kategori',
                'transaksi.type_transaksi',
                'transaksi.produk_description'
            )
            ->when($keyword, function ($query) use ($keyword) {
                $query->where('members.username', 'like', "%{$keyword}%");
                $query->orWhere('transaksi.created_at', 'like', "%{$keyword}%");
                $query->orWhere('transaksi.phone', 'like', "%{$keyword}%");
                $query->orWhere('transaksi.status_pengisian', 'like', "%{$keyword}%"); //decky
                $query->orWhere('members.nama_lengkap', 'like', "%{$keyword}%"); //decky
                $query->orWhere('members.email', 'like', "%{$keyword}%"); //decky
            })
            ->join('members', 'transaksi.member_id', 'members.id')
            ->join('akun_bank', 'transaksi.payment_method', 'akun_bank.id')
            ->orderBy('created_at', 'DESC')
            ->paginate(50); //decky

        $trans->appends($request->only('cari'));
        $result = (object) [
            'laba' => 0,
            'laba_seluruh' => 0,
            'transaksi_total_server' => 0,
            'transaksi_total' => 0,
            'bulan' => $bulan[str_pad($month, 2, "0", STR_PAD_LEFT)],
            'transaksi' => $trans,
        ];
        $result->transaksi_total = $result->transaksi_total + $transaksiBulan[0]->price;
        $result->transaksi_total_server = $result->transaksi_total_server + $transaksiBulan[0]->price_server;
        $result->laba = $labaBulan[0]->laba;
        $result->laba_seluruh = $result->laba_seluruh + $labaSeluruh[0]->laba;
        $result->potongan_admin = $potonganadmin[0]->potongan_admin_transaksi;

        return view('cms.transaksi-realtime.index', [
            'result' => $result
        ]);
    }

    public function new_data(Request $request)
    {
        // date_default_timezone_set('Asia/Jakarta');
        $data = Transaksi::
            whereRaw('DAY(transaksi.updated_at) = DAY(NOW())')
            ->leftJoin('members', 'members.id', 'transaksi.member_id')
            ->select([
                'transaksi.*',
                'members.username',
                'members.phone',
                'members.nama_lengkap',
                'members.saldo',
            ])
            ->orderBy('updated_at', 'desc')
            ->get();

        return response($data);
    }
}
