<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Models\Point;
use App\Models\Produk;
use App\Models\ProdukMemberStatus;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Yajra\DataTables\DataTables;

class PoinController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $members = Member::where('username', 'like', '%'.$request->query('search').'%')->get();
        $data = Point::whereBelongsTo($members)->paginate(10);

        $produk = Produk::orderBy('description')->get();
        $type_poin = ['Reedem Point', 'Referral Poin', 'Transaksi Downline'];
        $type = ['pemasukan', 'pengeluaran'];
        return view('cms.poin.index', [
            'data' => $data,
            'produk' => $produk,
            'type_poin' => $type_poin,
            'type' => $type
        ]);
    }

    public function members(Request $request)
    {
        try {
            $member = [];
            if(Str::length($request->query('q')) >=3) {
                $member = Member::
                    where('username', 'like', '%' . $request->query('q') . '%')
                    ->select(['id', 'username', 'email'])
                    ->get();
            }

            return response($member);
        } catch (\Exception $e) {
            return response($e, 500);
        }
    }

    public function json()
    {
        $variable = Point::select('point.*', 'members.username')->join('members', 'point.member_id', 'members.id')->get();
        // $variable = $ModalUniversal->getAll($this->table);
        for ($i = 0; $i < count($variable); $i++) {
            $variable[$i]->action = '<button type="button" class="btn btn-inline btn-sm btn-success" onclick="myModal(' . $variable[$i]->id . ')"><i class="fa fa-edit"></i></button>';
            // $variable[$i]->action .= '<button type="button" class="btn btn-inline btn-sm btn-danger" onclick="hapus('.$variable[$i]->id.')"><i class="fa fa-trash"></i></button>';
            // $variable[$i]->action .= '<button type="button" class="btn btn-inline btn-sm btn-info" onclick="changePassword('.$variable[$i]->id.')">Ganti Password</button>';
        }
        return DataTables::of($variable)->make(true);
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
        //
    }
}
