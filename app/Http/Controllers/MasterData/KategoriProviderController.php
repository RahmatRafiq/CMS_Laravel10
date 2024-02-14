<?php

namespace App\Http\Controllers\MasterData;

use App\Http\Controllers\Controller;
use App\Models\Kategori;
use App\Models\KategoriProvider;
use App\Models\Provider;
use Illuminate\Http\Request;

class KategoriProviderController extends Controller
{
    public function index()
    {

        $data = KategoriProvider::all();
        $kategori = Kategori::orderBy('created_at', 'asc')
            ->get();

        $provider = Provider::orderBy('created_at', 'asc')
            ->get();
        return view('master-data.kategori-provider.index', [
            'data' => $data,
            'kategori' => $kategori,
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
            'kategori_id' => $request->kategori_id,
            'provider_id' => $request->provider_id,
        );

        KategoriProvider::create($data_saved);
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

            'kategori_id' => $request->kategori_id,
            'provider_id' => $request->provider_id,

        ];
        KategoriProvider::query()->where('id', $id)->update($data_update);

        return redirect()
            ->back()
            ->with(['alert' => 'success', 'message' => '<strong>Sukses!</strong> Mengedit Data Kategori Provider.']);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        KategoriProvider::query()->where('id', $id)->delete();

        return redirect()->back();

    }
}
