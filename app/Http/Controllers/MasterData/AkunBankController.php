<?php

namespace App\Http\Controllers\MasterData;

use App\Http\Controllers\Controller;
use App\Http\Helpers\Helperku;
use App\Models\AkunBank;
use Illuminate\Http\Request;

class AkunBankController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = AkunBank::all();
        return view('master-data.akun-bank.index', [
            'data' => $data,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('master-data.akun-bank.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        $fileName = '';
        if ($request->file('image')) {
            $fileName = Helperku::uploadImage('user/img/bank', $request->file('image'));
        } else {
            $fileName = 'public/user/img/noimage.jpg';
        }

        $data_saved = [
            'nama_bank' => $request->nama_bank,
            'no_rekening' => $request->no_rekening,
            'atas_nama' => $request->atas_nama,
            'qris' => $request->qris,
            'image' => $fileName,
        ];
        AkunBank::create($data_saved);
        $link = redirect()->back();
        $link .= $link . '?message=Success&status-message=success';
        return $link;

        $data = AkunBank::all();
        return view('master-data.akun-bank.index', [
            'data' => $data,
        ]);

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $akun_bank = AkunBank::find($id);
        return view('master-data.akun-bank.show', [
            'akun_bank' => $akun_bank,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $akun_bank = AkunBank::find($id);
        return view('master-data.akun-bank.form', [
            'akun_bank' => $akun_bank,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');

        $akun_bank = AkunBank::find($request->id);
        $fileName = $akun_bank->image;
        if ($request->file('image')) {
            $fileName = Helperku::uploadImage('user/img/bank', $request->file('image'));
        }

        $data_update = [
            'nama_bank' => $request->nama_bank,
            'no_rekening' => $request->no_rekening,
            'atas_nama' => $request->atas_nama,
            'qris' => $request->qris,
            'image' => $fileName,
        ];
        $akun_bank->update($data_update);

        return redirect()
            ->back()
            ->with(['alert' => 'success', 'message' => '<strong>Sukses!</strong> Mengedit Data Bank.']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        AkunBank::find($id)->delete(); //
        $link = redirect()->back();
        $link .= $link . '?message=Success&status-message=success';
        return $link;
        $data = AkunBank::all();
        return view('master-data.akun-bank.index', [
            'data' => $data,
        ]);

    }
}
