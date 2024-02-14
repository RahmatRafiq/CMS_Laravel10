<?php

namespace App\Http\Controllers\MasterData;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Setting::all();
        for ($i = 0; $i < count($data); $i++) {
            $data[$i]->tot = $data[$i]->total;
            if ($data[$i]->title == 'CRON-JOB-D-FLASH') {
                $data[$i]->total = $data[$i]->total == 1 ? 'Aktif' : 'Tidak Aktif';
            } else if ($data[$i]->title == 'CASHBACK_POIN') {
                $data[$i]->total = $data[$i]->total == 1 ? 'Aktif' : 'Tidak Aktif';
            } else if ($data[$i]->title == 'NILAI_POIN') {
                $data[$i]->total = $data[$i]->total;
            } else if ($data[$i]->title == 'trial_member_status') {
                $data[$i]->total = $data[$i]->total . ' Hari';

            } else if ($data[$i]->title == 'sdk_register') {
                $data[$i]->total = substr($data[$i]->total, 1, 100);
            } else {
                $data[$i]->total = 'Rp ' . number_format(floatval($data[$i]->total), 0, ',', '.');
            }
            $data[$i]->action = '<button type="button" class="btn btn-inline btn-sm btn-success edit" onclick="myModal(' . $data[$i]->id . ')"><i class="fa fa-edit"></i></button>';
        }

        return view('master-data.setting.index', [
            'data' => $data,
        ]);
    }

    public function update(Request $request, string $id)
    {

        if (
            $request->title == 'sdk_register'
        ) {
            $data_update = [

                'title' => $request->title,
                'total' => $request->totalsdk,

            ];

        } else {
            $data_update = [

                'title' => $request->title,
                'total' => $request->total,

            ];

        }

        Setting::query()->where('id', $id)->update($data_update);

        return redirect()
            ->back()
            ->with(['alert' => 'success', 'message' => '<strong>Sukses!</strong> Mengedit Data Member.']);
    }

}
