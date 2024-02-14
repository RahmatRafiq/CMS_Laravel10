<?php

namespace App\Http\Controllers\MasterData;

use App\Http\Controllers\Controller;
use App\Models\Barang;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Barang::all();
        return view('master-data.barang.index', [
            'data' => $data,
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
        $image = [];
        if (isset($request->image)) {
            foreach ($request->image as $key => $value) {
                $file = $request->image[$key];
                $fileName = $key . date('FYHisA') . '.' . $file->getClientOriginalExtension();
                $destinationPath = 'public/barang/';
                $file->move($destinationPath, $fileName);
                $image[] = $fileName;
            }
        }

        $data_saved = [
            'image' => json_encode($image),
            'judul' => $request->judul,
            'harga' => $request->harga,
            'deskripsi' => $request->deskripsi,
            'deskripsi_tmbnl' => $request->deskripsi_tmbnl,
            'stok' => $request->stok,
            'warna' => $request->warna,
            'dukungan_kirim' => '',
        ];

        Barang::create($data_saved);
        return redirect()
            ->back()
            ->with(['alert' => 'success', 'message' => '<strong>Sukses!</strong> Menambah Data Barang.']);
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
    public function update(Request $request)
    {
        $image = [];
        if (isset($request->image)) {
            foreach ($request->image as $key => $value) {
                $file = $request->image[$key];
                $fileName = $key . date('FYHisA') . '.' . $file->getClientOriginalExtension();
                $destinationPath = 'public/barang/';
                $file->move($destinationPath, $fileName);
                $image[] = $fileName;
            }
        }

        $data_saved = [
            'judul' => $request->judul,
            'harga' => $request->harga,
            'deskripsi' => $request->deskripsi,
            'deskripsi_tmbnl' => $request->deskripsi_tmbnl,
            'stok' => $request->stok,
            'warna' => $request->warna,
        ];
        if (count($image) >= 1) {
            $data_saved['image'] = json_encode($image);
        }

        Barang::find($request->id)->update($data_saved);
        return redirect()
            ->back()
            ->with(['alert' => 'success', 'message' => '<strong>Sukses!</strong> Mengedit Data Barang.']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Barang::find($id)->delete();
        return redirect()
            ->back()
            ->with(['alert' => 'success', 'message' => '<strong>Sukses!</strong> Menghapus Data Barang.']);
    }
}
