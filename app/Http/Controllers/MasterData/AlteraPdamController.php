<?php

namespace App\Http\Controllers\MasterData;

use App\Http\Controllers\Controller;
use App\Models\AlteraPdam;
use Illuminate\Http\Request;

class AlteraPdamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = AlteraPdam::all();
        return view('master-data.altera-pdam.index', [
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
        $data_saved = array(
            'code' => $request->code,
            'description' => $request->description,
            'admin' => $request->admin,
            'poin' => $request->poin,
            'produk_notes' => $request->produk_notes,
        );

        AlteraPdam::create($data_saved);
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

            'code' => $request->code,
            'description' => $request->description,
            'admin' => $request->admin,
            'poin' => $request->poin,
            'produk_notes' => $request->produk_notes,
        ];
        AlteraPdam::query()->where('id', $id)->update($data_update);

        return redirect()
            ->back()
            ->with(['alert' => 'success', 'message' => '<strong>Sukses!</strong> Mengedit Data Member.']);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        AlteraPdam::query()->where('id', $id)->delete();

        return redirect()->back();

    }
}
