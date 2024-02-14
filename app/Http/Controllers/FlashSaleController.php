<?php

namespace App\Http\Controllers;

use App\Http\Helpers\Helperku;
use App\Models\FlashSale;
use App\Models\Produk;
use Illuminate\Http\Request;

class FlashSaleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = FlashSale::all();
        $produk = Produk::all();
        return view('cms.flash-sale.index', [
            'data' => $data,
            'produk' => $produk,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        $fileName = '';
        if ($request->file('image')) {
            $fileName = Helperku::uploadImage('user/img/bank', $request->file('image'));
        } else {
            $fileName = 'public/user/img/noimage.jpg';
        }

        $dateString = $request->date_sale;
        $timeString = $request->time_sale;
        $date = date('Y-m-d ', strtotime($dateString));
        $time = date('H:i:s', strtotime($timeString));

        $data_saved = array(
            'produk_id' => $request->produk_id,
            'price_sale' => $request->price_sale,
            'date_sale' => $date,
            'time_sale' => $time,
            'kuota_transaksi' => $request->kuota_transaksi,
            'total_transaksi' => $request->total_transaksi,
            'type' => $request->type,
            'is_active' => $request->is_active,
            'image' => $fileName,
        );
        FlashSale::create($data_saved);
        return redirect()
            ->back()
            ->with(['alert' => 'success', 'message' => '<strong>Sukses!</strong> Menambah Data Flash Sale.']);
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

        $dateString = $request->date_sale;
        $timeString = $request->time_sale;
        $date = date('Y-m-d ', strtotime($dateString));
        $time = date('H:i:s', strtotime($timeString));

        $data_update = array(
            'produk_id' => $request->produk_id,
            'price_sale' => $request->price_sale,
            'date_sale' => $date,
            'time_sale' => $time,
            'kuota_transaksi' => $request->kuota_transaksi,
            'total_transaksi' => $request->total_transaksi,
            'type' => $request->type,
            'is_active' => $request->is_active,
        );

        FlashSale::query()->where('id', $id)->update($data_update);

        return redirect()
            ->back()
            ->with(['alert' => 'success', 'message' => '<strong>Sukses!</strong> Mengedit Data Flash sale.']);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        FlashSale::find($id)->delete(); //

        return redirect()
            ->back()
            ->with(['alert' => 'success', 'message' => '<strong>Sukses!</strong> Menghapus Data Flash Sale.']);

    }
}
