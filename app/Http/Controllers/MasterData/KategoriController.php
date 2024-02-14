<?php

namespace App\Http\Controllers\MasterData;

use App\Http\Controllers\Controller;
use App\Models\Kategori;
use File;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data_kategori = Kategori::select('id', 'name', 'image', 'view_pelanggan_id')
            ->where('deleted_at', '=', null)
            ->get();
        return view('master-data.kategori.view_kategori', ['data_kategori' => $data_kategori]);
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
        $image = '';
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $rewardsUploadPath = 'public/user/img/kategori';

            $file_extension = $file->getClientOriginalExtension(); //** get filename extension
            $fileName = date("FYhisA") . '.' . $file_extension;
            $file->move($rewardsUploadPath, $fileName);
            $image = $rewardsUploadPath . '/' . $fileName;
        }

        Kategori::create([
            ...$request->all(),
            'image' => $image,
        ]);
        return redirect()
            ->back()
            ->with(['alert' => 'success', 'message' => '<strong>Sukses!</strong> Mengedit Data Contoh.']);
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
        $id = $request->id;
        $rules = [
            'name' => 'required|string|min:3|max:255',
            'image' => 'image|max:2048',
            'view_pelanggan_id' => 'required|boolean',
        ];
        $this->validate($request, $rules);

        $data = Kategori::where('id', '=', $id)->where('deleted_at', '=', null)->firstOrFail();

        $filename = public_path('user/img/kategori' . $data->image);

        $data->name = $request->name;
        $filenameDate = date("FYhisA");
        if ($request->hasFile('image')) {
            $file = $request->file('image');

            if (file_exists($filename)) {
                unlink($filename);
            }
            $file_extension = $file->getClientOriginalExtension(); //** get filename extension
            $fileName = $filenameDate . '.' . $file_extension;
            $rewardsUploadPath = 'public/user/img/kategori';
            $data->image = $rewardsUploadPath . '/' . $fileName;
            $file->move($rewardsUploadPath, $fileName);
        }
        $data->view_pelanggan_id = $request->view_pelanggan_id;
        $data->save();

        return redirect()
            ->back()
            ->with(['alert' => 'success', 'message' => '<strong>Sukses!</strong> Mengedit Data Contoh.']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Kategori::where('id', '=', $id)->where('deleted_at', '=', null)->firstOrFail();
        // $filename = public_path('user/img/kategori'.$data->image);

        if (File::exists($data->image)) {
            File::delete($data->image);
        }
        $data->delete();
        return redirect()->back()->with(['alert' => 'success', 'message' => '<strong>Sukses!</strong> Menghapus Data Contoh.']);
    }
}
