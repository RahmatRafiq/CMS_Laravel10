<?php

namespace App\Http\Controllers\MasterData;

use App\Http\Controllers\Controller;
use App\Http\Helpers\Helperku;
use App\Models\Provider;
use Illuminate\Http\Request;

class ProviderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Provider::all();
        return view('master-data.provider.index', [
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
        date_default_timezone_set('Asia/Jakarta');

        if ($request->file('image')) {
            $fileName = Helperku::uploadImage('user/img/bank', $request->file('image'));
        } else {
            $fileName = 'public/user/img/noimage.jpg';
        }

        $data_saved = [
            'nama' => $request->nama,
            'image' => $fileName,
        ];

        Provider::create($data_saved);

        \Session::flash('message', 'Menyimpan Data provider Berhasil!');
        return redirect()->back();
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
        date_default_timezone_set('Asia/Jakarta');

        $provider = Provider::find($request->id);

        $fileName = $provider->image;
        if ($request->file('image')) {
            $fileName = Helperku::uploadImage('user/img/bank', $request->file('image'));
        }

        $data_update = [
            'nama' => $request->nama,
            'image' => $fileName,
        ];
        $provider->update($data_update);

        \Session::flash('message', 'Mengubah Data Kategori Berhasil!');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $provider = Provider::find($id);
        if ($provider->image && $provider->image != 'public/user/img/noimage.jpg' && file_exists($provider->image)) {
            unlink($provider->image);
        }
        $provider->delete();
        return redirect()->back();
    }
}
