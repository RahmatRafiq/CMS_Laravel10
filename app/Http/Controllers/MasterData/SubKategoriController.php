<?php

namespace App\Http\Controllers\MasterData;

use App\Http\Controllers\Controller;
use App\Http\Helpers\Helperku;
use App\Models\Kategori;
use App\Models\SubKategori;
use Illuminate\Http\Request;

class SubKategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $data = SubKategori::all();
        $server = SubKategori::select('server')->distinct()->get();
        $kategori = Kategori::orderBy('created_at', 'asc')
            ->get();
        return view('master-data.sub-kategori.index', [
            'data' => $data,
            'kategori' => $kategori,
            'server' => $server,
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
            $fileName = Helperku::uploadImage('user/img/sub_kategori', $request->file('image'));
        } else {
            $fileName = 'public/user/img/noimage.jpg';
        }

        $data_saved = array(
            'kategori_id' => $request->kategori_id,
            'name' => $request->name,
            'server' => $request->server1,
            'image' => $fileName,
        );

        SubKategori::create($data_saved);
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

        date_default_timezone_set('Asia/Jakarta');

        $sub_kategori = SubKategori::find($request->id);
        $fileName = $sub_kategori->image;
        if ($request->file('image')) {
            $fileName = Helperku::uploadImage('user/img/sub_kategori', $request->file('image'));
        }

        $data_update = [

            'kategori_id' => $request->kategori_id,
            'name' => $request->name,
            'server' => $request->server1,
            'image' => $fileName,

        ];
        SubKategori::query()->where('id', $id)->update($data_update);

        return redirect()
            ->back()
            ->with(['alert' => 'success', 'message' => '<strong>Sukses!</strong> Mengedit Data Sub Kategori.']);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        SubKategori::query()->where('id', $id)->delete();

        return redirect()->back();

    }
}
