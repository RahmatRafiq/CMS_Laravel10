<?php

namespace App\Http\Controllers;
use App\Models\Profile;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Profile::all()->where('id','=',1)->first();
        return view('cms.profile.index', [
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
        //
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

            'tentang_poin' => $request->tentang_poin,
            'notifikasi' => $request->notifikasi,
            'syarat_premium' => $request->syarat_premium,

        ];
        Profile::query()->where('id', $id)->update($data_update);

        return redirect()
            ->back()
            ->with(['alert' => 'success', 'message' => '<strong>Sukses!</strong> Mengedit Data Profile.']);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
