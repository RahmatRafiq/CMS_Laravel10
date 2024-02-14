<?php

namespace App\Http\Controllers\MasterData;

use App\Http\Controllers\Controller;
use App\Models\Provider;
use App\Models\SubKategori;
use App\Models\SubKategoriProvider;
use Illuminate\Http\Request;

class SubKategoriProviderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = SubKategoriProvider::all();
        $sub_kategori = SubKategori::orderBy('created_at', 'asc')
            ->get();
        $provider = Provider::orderBy('created_at', 'asc')
            ->get();
        return view('master-data.sub-kategori-provider.index', [
            'data' => $data,
            'sub_kategori' => $sub_kategori,
            'provider' => $provider,
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
            'sub_kategori_id' => $request->sub_kategori_id,
            'provider_id' => $request->provider_id,
        );

        SubKategoriProvider::insert($data_saved);
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data_update = [

            'sub_kategori_id' => $request->sub_kategori_id,
            'provider_id' => $request->provider_id,

        ];
        SubKategoriProvider::query()->where('id', $id)->update($data_update);

        return redirect()
            ->back()
            ->with(['alert' => 'success', 'message' => '<strong>Sukses!</strong> Mengedit Data Sub Kategori.']);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        SubKategoriProvider::query()->where('id', $id)->delete();

        return redirect()->back();

    }
}
