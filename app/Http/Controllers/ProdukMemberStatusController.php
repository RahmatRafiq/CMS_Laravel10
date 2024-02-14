<?php

namespace App\Http\Controllers;

use App\Models\MemberStatus;
use App\Models\Produk;
use App\Models\ProdukMemberStatus;
use Illuminate\Http\Request;

class ProdukMemberStatusController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = ProdukMemberStatus::all();
        $produk = Produk::all();
        $memberstatus = MemberStatus::all();
        return view('cms.produk-member-status.index', [
            'data' => $data,
            'produk' => $produk,
            'memberstatus' => $memberstatus,
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
        $data_saved = array(
            'id_member_status' => $request->id_member_status,
            'day_active' => $request->day_active,
            'id_produk' => $request->id_produk,
            'status' => $request->status,
        );

        ProdukMemberStatus::create($data_saved);
        return redirect()
            ->back()
            ->with(['alert' => 'success', 'message' => '<strong>Sukses!</strong> Menambah Data Produk Member Status.']);

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data_update = array(
            'id_member_status' => $request->id_member_status,
            'day_active' => $request->day_active,
            'id_produk' => $request->id_produk,
            'status' => $request->status,
        );

        ProdukMemberStatus::where('id', $id)->update($data_update);
        return redirect()
            ->back()
            ->with(['alert' => 'success', 'message' => '<strong>Sukses!</strong> Mengubah Data Produk Member Status.']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        ProdukMemberStatus::find($id)->delete(); //

        return redirect()
            ->back()
            ->with(['alert' => 'success', 'message' => '<strong>Sukses!</strong> Menghapus Data Produk Member Status.']);

    }
}
