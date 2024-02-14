<?php

namespace App\Http\Helpers;

use App\Jobs\kirimWhatsApp;
use App\Jobs\prosesNotif;
use App\Member;
use App\Model\MutasiAdmin;
use App\Point;
use App\SettingsModel;
use App\Transaksi;
use Carbon\Carbon;
use CURLFile;
use Fcm\FcmClient;
use Fcm\Push\Notification;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Pusher\Pusher;

class Helperku
{
    public static function provider($nomor)
    {
        $awalan = substr($nomor, 0, 4);
        $xl_arr = ['', '0877', '0878', '0817', '0818', '0819', '0859'];
        $telkomsel_arr = ['', '0811', '0812', '0813', '0821', '0822', '0823', '0852', '0853', '0851'];
        $tri_arr = ['', '0898', '0899', '0895', '0896', '0897'];
        $indosat_arr = ['', '0814', '0815', '0816', '0855', '0856', '0857', '0858'];
        $smartfren_arr = ['', '0889', '0881', '0882', '0883', '0884', '0885', '0886', '0887', '0888'];
        $axis_arr = ['', '0831', '0832', '0833', '0838', '0838', '08591'];
        $byu_arr = ['', '085155', '085156', '085157'];

        if (array_search(substr($nomor, 0, 6), $byu_arr)) {
            return 'byu';
        } else {
            if (array_search($awalan, $xl_arr)) {
                return 'xl';
            } else if (array_search($awalan, $smartfren_arr)) {
                return 'smartfren';
            } else if (array_search($awalan, $indosat_arr)) {
                return 'indosat';
            } else if (array_search($awalan, $axis_arr)) {
                return 'axis';
            } else if (array_search($awalan, $tri_arr)) {
                return '3';
            } else if (array_search($awalan, $telkomsel_arr)) {
                return 'telkomsel';
            }
        }
    }

    public static function getOtp($tot)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i <= $tot; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
    public static function getOtpLogin($tot)
    {
        $characters = '0123456789';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i <= $tot; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
    public static function randomNumber($tot)
    {
        $characters = '0123456789';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 1; $i <= $tot; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    public static function generateQris($nominal, $no_transaksi)
    {
        $postData = [
            'nominal' => $nominal,
            'merchant_id' => 2131,
            'merchant_pan' => 222,
            'bill_number' => $no_transaksi
        ];

        $ch = curl_init();
        $headers = [
            'Content-type: application/json'
        ];
        curl_setopt($ch, CURLOPT_URL, "https://qris-bangbeli.herokuapp.com");
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($postData));
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        $result = curl_exec($ch);
        return json_decode($result)->data;
    }


    public static function no_transaksi()
    {
        $transaksi_hari_ini = DB::table('transaksi')->whereDate("created_at", '=', date('Y-m-d'))->get();
        $strRandom = Helperku::randomNumber(4);
        $transaksi_hari_ini = count($transaksi_hari_ini);
        $tgl_skr = Carbon::now()->timestamp;
        $no_transaksi = "TR" . $tgl_skr . $strRandom;
        if (DB::table('transaksi')->where("no_transaksi", '=', $no_transaksi)->first()) {
            Helperku::no_transaksi();
        } else {
            return $no_transaksi;
        }
    }


    public static function secret_key($tipe)
    {
        if ($tipe == 'flip') {
            return 'JDJ5JDEzJFVyVEd4YUNpemJHZzBRZFA5L1I2Yk92Q1NuZDkyOUZjeVUxTDVKdUlrdTduYTIwNUV1YWdt';
        }
    }

    public static function getUrl($tipe)
    {
        $url = '';
        if ($tipe == 'dflash') {
            $url = 'http://api.dflash.co.id';
        }
        return $url;
    }

    public static function curl_flip($url, $payloads = false, $tipe = false)
    {
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_HEADER, FALSE);

        if ($payloads) {
            if ($tipe == 'cek_no_rek') {
                curl_setopt($ch, CURLOPT_POST, TRUE);
                curl_setopt($ch, CURLOPT_POSTFIELDS, $payloads);
            } else {
                curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($payloads));
            }
        }

        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            "Content-Type: application/x-www-form-urlencoded"
        )
        );

        curl_setopt($ch, CURLOPT_USERPWD, Helperku::secret_key('flip') . ":");

        $response = curl_exec($ch);
        curl_close($ch);
        return json_decode($response);
    }

    public static function post_dflash($url)
    {
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($curl, CURLOPT_HTTPHEADER, [
            'Accept: application/json',
        ]);
        $response = curl_exec($curl);
        curl_close($curl);
        $respon = json_decode($response, true);

        return $respon;
    }

    public static function send_wa($telp, $pesan)
    {
        $dataPost = (object) [
            'nomor' => (int) $telp,
            'pesan' => $pesan
        ];
        dispatch(new kirimWhatsApp($dataPost));
    }

    public static function premiumTransaksi($memberId, $idTransaksi)
    {
        Transaksi::where([
            'id' => $idTransaksi
        ])->update([
                'status_pengisian' => "Berhasil",
                'payment_status' => 'sukses'
            ]);
        $member = Member::where([
            'id' => $memberId
        ]);
        $memberData = $member->first();
        $cashback = DB::table("setting")->where("title", "=", "CASHBACK_PREMIUM")->first();
        $cashcbackPoint = $cashback->total;

        $transaksi = Transaksi::where([
            'id' => $idTransaksi
        ])->first();
        GlobalHelper::addPointPremium($memberId, $transaksi, $cashcbackPoint);

        $member->update([
            'status_member' => "premium",
            "kode_referral" => Helperku::generate_kode_referral(),
            "date_premium" => Carbon::now()->toDateTimeString(),
        ]);
    }

    public static function memberStatusTransaksi($memberId, $idTransaksi, $idProduk)
    {
        Transaksi::where([
            'id' => $idTransaksi
        ])->update([
                'status_pengisian' => "Berhasil",
                'payment_status' => 'sukses'
            ]);
        $member = Member::where([
            'id' => $memberId
        ]);
        $memberData = $member->first();
        $cashback = DB::table("setting")->where("title", "=", "CASHBACK_PREMIUM")->first();
        $cashcbackPoint = $cashback->total;

        $transaksi = Transaksi::where([
            'id' => $idTransaksi
        ])->first();
        GlobalHelper::addPointPremium($memberId, $transaksi, $cashcbackPoint);

        $produk_member_status = DB::table('produk_member_status')
            ->select('produk_member_status.*', 'member_status.status_name')
            ->join('member_status', 'member_status.id', 'produk_member_status.id_member_status')
            ->where('status', '=', 1)
            ->where('id_produk', '=', $idProduk)
            ->first();

        $member->update([
            'status_member' => $produk_member_status->status_name,
            "kode_referral" => Helperku::generate_kode_referral(),
            "date_premium" => Carbon::now()->toDateTimeString(),
        ]);

        $member_status_active = DB::table('member_status_active')
            ->whereDate('end_active', '>=', date('Y-m-d'))
            ->where('member_id', '=', $memberId)
            ->orderBy('end_active', 'desc')
            ->first();
        $date_now = date('Y-m-d');
        if ($member_status_active) {
            $date_now = $member_status_active->end_active;
        }
        $date_expired = strtotime("+" . $produk_member_status->day_active . " day", strtotime($date_now));
        $date_expired = date('Y-m-d', $date_expired);
        DB::table('member_status_active')->insert([
            'member_id' => $memberId,
            'start_active' => $date_now,
            'end_active' => $date_expired,
            'id_member_status' => $produk_member_status->id_member_status,
            'from_status' => 'transaksi'
        ]);
    }

    public static function generate_kode_referral()
    {
        $str_result = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
        $kode_referral = 'BB' . substr(str_shuffle($str_result), 0, 4);
        $cek_referrral = DB::table('members')->where('kode_referral', '=', $kode_referral)->first();
        if ($cek_referrral) {
            Helperku::generate_kode_referral();
        } else {
            return $kode_referral;
        }
    }

    public static function cekRefundDuplicate($reff_id)
    {
        $cek = DB::table('mutasi_saldo')->where([
            'reff_id' => $reff_id,
            'status' => "pemasukan"
        ])->get();
        if (count($cek) > 0) {
            return false;
        } else {
            return true;
        }
    }

    public static function refundTransaction($id_transaksi, $status_text, $status_code, $habis = false)
    {
        try {
            $details = DB::table('transaksi')->where([
                'transaksi.id' => $id_transaksi,
                'transaksi.otomatis' => 1,
                'status_server' => '',
                'status_server_code' => '',
                'status_pengisian' => 'Pengisian'
            ])->first();
            $members = DB::table('members')->where('id', $details->member_id);
            $memberData = $members->first();
            $saldo = 0;
            $saldoAwal = 0;
            if ($details->payment_method == 4) {
                $saldoAwal = intval($memberData->saldo);
                $saldo = (intval($details->price) + intval($memberData->saldo));
            } else {
                $saldoAwal = intval($details->kode_unik) + intval($memberData->saldo);
                $saldo = (intval($details->price) + intval($details->kode_unik) + intval($memberData->saldo));
            }
            DB::table('transaksi')->where('id', $id_transaksi)->update([
                'status_server' => $status_text,
                'status_server_code' => $status_code,
                'payment_status' => 'Sukses',
                'status_pengisian' => 'Refund'
            ]);
            $coba = DB::table('mutasi_saldo')->insert([
                'deskrispi' => 'Pengembalian ' . $details->produk_description,
                'total' => $details->price,
                'saldo_akhir' => $saldo,
                'status' => "pemasukan",
                'created_at' => Carbon::now()->toDateTimeString(),
                'member_id' => $details->member_id,
                'reff_id' => $details->no_transaksi . " - masuk",
                'saldo_awal' => $saldoAwal,
                'id_transaction' => $details->id
            ]);
            if ($coba) {
                $members->update([
                    'saldo' => $saldo
                ]);
                Helperku::kirimNotifikasi($details, $status_text, $habis);
                return true;
            } else {
                return false;
            }
        } catch (\Throwable $th) {
            return false;
        }
    }

    public static function kirimNotifikasi($details, $status_text, $habis = false)
    {

        $memberData = Member::where('id', $details->member_id)->first();
        if ($memberData) {
            if (strlen($memberData->token_notif) > 2) {
                dispatch(new prosesNotif($memberData->email, $memberData->token_notif, 'Transaksi ke ' . $details->phone . ' Gagal, ' . $status_text . ($habis ? " Silahka ulangi dalam beberapa menit lagi" : ''), 'Transaksi Gagal'));
            }
        }
    }

    public static function kirimNotifikasiSukses($details)
    {
        $memberData = Member::where('id', $details->member_id)->first();
        if ($memberData) {
            if (strlen($memberData->token_notif) > 2) {
                dispatch(new prosesNotif($memberData->email, $memberData->token_notif, 'Transaksi ke ' . $details->phone . ' Sukses', 'Transaksi Sukses'));
            }
        }
    }

    public static function kirimNotifikasiTootherService($email = "", $token, $message, $title)
    {
        try {
            $dataPost = [
                "member_email" => $email,
                "firebase_token" => $token,
                "message" => $message,
                "title" => $title
            ];
            $ch = curl_init();
            if (env("SECURE") == 1) {
                curl_setopt($ch, CURLOPT_URL, 'https://notification.bangbeli.com/notifications');
            } else {
                curl_setopt($ch, CURLOPT_URL, 'http://notification.bangbeli.com/notifications');
            }
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($dataPost));
            $headers = array(
                'Content-Type: application/json',
                'Accept: application/json',
            );
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
            $result = curl_exec($ch);
            // dd($result);
            curl_close($ch);
            return true;
        } catch (\Throwable $th) {
            return false;
        }
    }

    public static function checkMutasiAdmin($idTransaksi = "")
    {
        try {
            $dataCheck = MutasiAdmin::where("id_transaksi", $idTransaksi)->count();
            if ($dataCheck > 0)
                return false;
            return true;
        } catch (\Throwable $th) {
            return false;
        }
    }

    public static function removeCache($idMember)
    {
        try {
            $urllengkap = "https://account.bangbeli.com/delete/" . $idMember;
            $exec = exec("curl -s -X GET " . $urllengkap);
            // curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            return $exec;
        } catch (\Throwable $th) {
            dd($th);
            return false;
        }
    }

    public static function Disabletransaksi()
    {
        try {
            $settingValue = SettingsModel::where('title', 'DISABLE_TRANSAKSI')->first();
            if (!$settingValue)
                return true;
            if ($settingValue->total > 0)
                return false;
            return true;
        } catch (\Throwable $th) {
            return true;
        }
    }

    public static function uploadImage($path, $image): string
    {
        $ch = curl_init(env('MAIN_HOST_URL') . 'api/v3/image');
        curl_setopt_array($ch, [
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_VERBOSE => 1,
            CURLOPT_HTTPHEADER => [
                "Authorization: Bearer " . env("TOKEN")
            ],
            CURLOPT_POST => 1,
            CURLOPT_POSTFIELDS => [
                'path' => $path,
                'image' => new CURLFile($image)
            ]
        ]);

        $response = curl_exec($ch);

        $data = json_decode($response)->data;
        $fileName = "$data->path/$data->filename";

        return $fileName;
    }

    public static function kirimPusher(
        $channel = 'create_transaksi',
        $event = 'transaksi_baru',
        $pesan = 'Ada Transaksi Baru Bang'
    ) {
        $options = array(
            'cluster' => 'ap1',
            'useTLS' => true
        );
        $pusher = new Pusher(
            env("PUSHER_APP_KEY"),
            env("PUSHER_APP_SECRET"),
            env("PUSHER_APP_ID"),
            $options
        );
        $data['message'] = $pesan;
        $response = $pusher->trigger($channel, $event, $data);

        return $response;
    }

}
