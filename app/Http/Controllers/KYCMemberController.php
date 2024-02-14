<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;

class KYCMemberController extends Controller
{
    public function index()
    {
        $data = Member::where('is_kyc', 1)->get();

        return view('cms.kyc-member.index', [
            'data' => $data
        ]);
    }
}
