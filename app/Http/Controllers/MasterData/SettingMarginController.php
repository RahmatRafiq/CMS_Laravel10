<?php

namespace App\Http\Controllers\MasterData;

use App\Http\Controllers\Controller;
use App\Models\SettingMargin;
use Illuminate\Http\Request;

class SettingMarginController extends Controller
{

    public function index()
    {
        $data = SettingMargin::all();
        return view('master-data.setting-margin.index', [
            'data' => $data,
        ]);

    }
    public function store(Request $request)
    {
        $data_saved = array(
            'range_start' => $request->range_start,
            'range_end' => $request->range_end,
            'margin' => $request->margin,
            'member_type' => $request->member_type,
            'status' => $request->status,
        );

        SettingMargin::create($data_saved);
        return redirect()
            ->back()
            ->with(['alert' => 'success', 'message' => '<strong>Sukses!</strong> Menambah Setting Margin.']);

    }

    public function update(Request $request, string $id)
    {
        $data_update = array(
            'range_start' => $request->range_start,
            'range_end' => $request->range_end,
            'margin' => $request->margin,
            'member_type' => $request->member_type,
            'status' => $request->status,
        );

        SettingMargin::query()->where('id', $id)->update($data_update);

        return redirect()
            ->back()
            ->with(['alert' => 'success', 'message' => '<strong>Sukses!</strong> Menambah Setting Margin.']);

    }
}
