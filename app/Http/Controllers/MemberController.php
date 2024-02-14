<?php

namespace App\Http\Controllers;

use App\Http\Helpers\Helperku;
use App\Http\Requests\StoreMemberRequest;
use App\Http\Requests\UpdateMemberRequest;
use App\Models\Member;
use App\Models\MutasiAdmin;
use App\Models\Point;
use App\Models\Transaksi;
use App\Models\User;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $saldo = Member::sum("saldo");
        $data = Member::all();

        return view('cms.member.index', [
            'data' => $data,
            'saldo' => $saldo
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = Member::query()->where('email', $request->email)->first();
        if ($data) {
            return redirect()
                ->back()
                ->with(['alert' => 'danger', 'message' => '<strong>Gagal!</strong> Email Sudah Digunakan.']);
        }
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i <= 5; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        $data_saved = [
            'username' => $request->username,
            'saldo' => $request->saldo,
            'poin' => $request->poin,
            'phone' => $request->phone,
            'password' => bcrypt($request->password),
            'email' => $request->email,
            'address' => $request->address,
            'verifikasi' => $request->verifikasi,
            'gender' => $request->gender,
            'nama_lengkap' => $request->nama_lengkap,
            'status_member' => $request->status_member,
            'status_user' => $request->status_member,
            'otp' => $randomString,
            'token_notif' => $request->token_notif,
            //decky
            'total_masukan_pin' => $request->total_masukan_pin,
            //decky
            'pin' => $request->pin,
            //decky
            'remember_token' => 0,
            'is_kyc' => 0,
            'failed_pass' => 0,
        ];
        Member::create($data_saved);
        return redirect()
            ->back()
            ->with(['alert' => 'success', 'message' => '<strong>Sukses!</strong> Menambah Data User.']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Member $member)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Member $member)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');

        $id = $request->id;
        $data = Member::where('email', '=', $request->email)->first();
        if ($data && $data->id != $id) {
            return redirect()
                ->back()
                ->with(['alert' => 'danger', 'message' => '<strong>Gagal!</strong> Email Sudah Digunakan.']);
        }

        date_default_timezone_set('Asia/Jakarta');

        if ($request->status_member == 'premium' && !$data->kode_referral) {
            $kode_referral = Helperku::generate_kode_referral();

            Member::query()->where('id', $id)->update([
                'kode_referral' => $kode_referral,
                'date_premium' => date('Y-m-d H:i:s')
            ]);

            if ($data->id_atas) {
                //jika ada atasan
                $poin_referral = 4000;
                $data_referral = Member::query()->where('id', $data->id_atas)->first();

                Member::query()
                    ->where('id', '=', $data_referral->id)
                    ->update([
                        'poin' => $data_referral->poin + $poin_referral
                    ]);

                Point::insert([
                    'member_id' => $data->id_atas,
                    'description' => 'Premiun Downline dari ' . $data->username,
                    'point' => $poin_referral,
                    'type_point' => 'Premium Downline',
                    'type' => 'pemasukan',
                    'point_akhir' => $data_referral->poin,
                    'created_at' => date('Y-m-d H:i:s')
                ]);
            }
        }

        $data_update = [
            'username' => $request->username,
            'saldo' => $request->saldo,
            'poin' => $request->poin,
            'phone' => $request->phone,
            'email' => $request->email,
            'address' => $request->address,
            'verifikasi' => $request->verifikasi,
            'gender' => $request->gender,
            'nama_lengkap' => $request->nama_lengkap,
            'status_member' => $request->status_member,
            'total_masukan_pin' => $request->total_masukan_pin,
            //decky
            'pin' => $request->pin,
            //decky
            'updated_at' => date('Y-m-d H:i:s')
        ];
        // $ModalUniversal->updateData('members', $data_update, $id);
        Member::query()->where('id', $id)->update($data_update);

        return redirect()
            ->back()
            ->with(['alert' => 'success', 'message' => '<strong>Sukses!</strong> Mengedit Data Member.']);
    }

    public function ganti_password(Request $request)
    {
        $member = Member::where('id', $request->id)
            ->update([
                'password' => bcrypt($request->password)
            ]);
        // dd($member);
        return redirect()->back();
    }

    public function tambah_saldo(Request $request)
    {
        try {
            $no_transaksi = Helperku::no_transaksi();
            $idTransaksi = Transaksi::create([
                'member_id' => $request->id,
                'payment_method' => 14,
                'payment_status' => 'Sukses',
                'status_pengisian' => 'Pengisian',
                'price' => $request->saldo,
                'created_at' => date('Y-m-d H:i:s'),
                'kode_unik' => 0,
                'no_transaksi' => $no_transaksi,
                'type_transaksi' => 'Topup',
                'otomatis' => 0,
                'kode_produk' => '',
                'status_server' => '',
                'status_server_code' => '',
                'price_server' => 0,
                'asal_server' => 0,
                'poin' => 0,
                'biaya_admin' => 0,
                'potongan_admin' => 0,
            ]);
            // $adminDetail = User::where('id', session('user_id'))->first();
            $keterangan = "Direct Deposit Admin";
            if (Helperku::checkMutasiAdmin($idTransaksi)) {
                MutasiAdmin::create([
                    "member_id" => $request->id,
                    "nominal" => $request->nominal,
                    // "admin_email" => $adminDetail->email,
                    "admin_email" => 'BE pasti tau',
                    "lunas" => 0,
                    "keterangan" => "Transaksi " . $keterangan,
                    "id_transaksi" => $idTransaksi
                ]);
            }

            $member = Member::find($request->id);
            $member->saldo = $member->saldo + $request->saldo;
            $member->save();

            return redirect()->back();
        } catch (\Exception $e) {
            dd($e);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Member::query()->where('id', $id)->delete();

        return redirect()->back();
    }
}
