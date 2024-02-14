<?php

namespace App\Http\Controllers\MasterData;

use App\Http\Controllers\Controller;
use App\Http\Helpers\Helperku;
use App\Models\Kategori;
use App\Models\Produk;
use App\Models\SubKategori;
use DB;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Produk::all();
        $kategori = Kategori::orderBy('created_at', 'asc')
            ->get();
        $sub_kategori = SubKategori::all();
        return view('master-data.produk.index', [
            'data' => $data,
            'kategori' => $kategori,
            'sub_kategori' => $sub_kategori,

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
        if ($request->file('image')) {
            $fileName = Helperku::uploadImage('user/img/produk', $request->file('image'));
        } else {
            $fileName = 'public/user/img/noimage.jpg';
        }

        $data_saved = array(
            // 'kategori_id' => $request->kategori_id,
            // 'provider_id' => $request->provider_id,
            'sub_kategori_id' => $request->sub_kategori_id,
            'otomatis' => $request->otomatis,
            'description' => $request->description,
            'notes' => $request->notes,
            'poin' => $request->poin,
            'kode_produk' => $request->kode_produk,
            'price' => $request->price,
            'stok' => $request->stok,
            'image_produk' => $fileName,
        );

        Produk::create($data_saved);
        return redirect()
            ->back()
            ->with(['alert' => 'success', 'message' => '<strong>Sukses!</strong> Menambah Data User.']);

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

    }

    public function update(Request $request, string $id)
    {

        date_default_timezone_set('Asia/Jakarta');

        $produk = Produk::find($request->id);
        $fileName = $produk->image;
        if ($request->file('image')) {
            $fileName = Helperku::uploadImage('user/img/produk', $request->file('image'));
        }

        $data_update = [

            'sub_kategori_id' => $request->sub_kategori_id,
            'otomatis' => $request->otomatis,
            'description' => $request->description,
            'notes' => $request->notes,
            'poin' => $request->poin,
            'kode_produk' => $request->kode_produk,
            'price' => $request->price,
            'stok' => $request->stok,
            'image_produk' => $fileName,

        ];
        Produk::query()->where('id', $id)->update($data_update);

        return redirect()
            ->back()
            ->with(['alert' => 'success', 'message' => '<strong>Sukses!</strong> Mengedit Data Kategori Provider.']);

    }
    public function destroy(string $id)
    {
        produk::find($id)->delete();

        return redirect()->back();

    }
    public function subKategoriByKategori($kategori_id)
    {
        $data = DB::table('sub_kategori')->where('kategori_id', '=', $kategori_id)->orderBy('name', 'ASC')->get();
        return json_encode($data);
    }
}
