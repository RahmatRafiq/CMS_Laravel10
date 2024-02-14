<?php

namespace App\Http\Controllers;
use App\Models\GantiPassword;
use App\Models\user;
use Illuminate\Http\Request;

class GantiPasswordController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     public function index()
    {
        return view('cms.ganti-password.index', [
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
        $user = $this->user->getByEmail($request->email);
        if ($user) {
            $pass = $request->password;
            $salt = 'bangbelibakalsuksescoykalembaerintanganpastiakanlewatdanakandiatas';
            $password = md5(base64_encode($pass . $salt));
            $this->user->ubah($user->id, ['password' => $password]);
            return redirect('logout');
        } else {
            return back()->with(['message' => 'Email Salah', 'alert' => 'danger']);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
