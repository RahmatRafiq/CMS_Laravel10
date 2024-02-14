<?php

namespace App\Http\Controllers;

use App\Models\BannedMember;
use Illuminate\Http\Request;

class BannedMemberController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $data = BannedMember::all();
        // dd($data);
        return view('cms.banned-member.index', [
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        BannedMember::query()->where('id', $id)->delete();

        return redirect()->back();

    }
}
