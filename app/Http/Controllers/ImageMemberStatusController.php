<?php

namespace App\Http\Controllers;

use App\Http\Helpers\Helperku;
use App\Models\ImageMemberStatus;
use App\Models\ProdukMemberStatus;
use Illuminate\Http\Request;

class ImageMemberStatusController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = ImageMemberStatus::all();
        $produk = ProdukMemberStatus::all();
        $memberstatus = ProdukMemberStatus::all();

        // dd($memberstatus);
        return view('cms.image-member-status.index', [
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

        date_default_timezone_set('Asia/Jakarta');
        $fileName = '';
        if ($request->file('gambar')) {
            $fileName = Helperku::uploadImage('user/img/produkms', $request->file('gambar'));
        } else {
            $fileName = 'public/user/img/noimage.jpg';
        }

        $data_saved = array(
            'id_produk_member_status' => $request->id_produk_member_status,
            'status' => $request->status,
            'gambar' => $fileName,
        );
        // dd($data_saved);
        ImageMemberStatus::create($data_saved);
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

        date_default_timezone_set('Asia/Jakarta');
        $image_ms = ImageMemberStatus::find($id);

        $fileName = $image_ms->gambar;
        if ($request->file('gambar')) {
            if ($image_ms->gambar && $image_ms->gambar != 'public/user/img/noimage.jpg' && file_exists($image_ms->gambar)) {
                unlink($image_ms->gambar);
            }

            $fileName = Helperku::uploadImage('user/img/produkms', $request->file('gambar'));
        }

        $data_update = array(
            'id_produk_member_status' => $request->id_produk_member_status,
            'status' => $request->status,
            'gambar' => $fileName,
        );

        $image_ms->update($data_update);

        return redirect()
            ->back()
            ->with(['alert' => 'success', 'message' => '<strong>Sukses!</strong> Mengubah Data Image Member Status.']);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        ImageMemberStatus::find($id)->delete(); //

        return redirect()
            ->back()
            ->with(['alert' => 'success', 'message' => '<strong>Sukses!</strong> Menghapus Data Barang.']);

    }
}
