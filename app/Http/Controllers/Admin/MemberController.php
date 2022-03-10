<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Member;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    public function tambah()
    {
        return view('master.admin.anggota.plus');
    }

    public function store(Request $request)
    {
        // return response()->json($request);
        if ($request->file('image')) {
            $file = $request->file('image')->store('gambar', 'public');
        }

        Member::create([
            "member_code" => $request->input('member_code'),
            "name" => $request->input('name'),
            "address" => $request->input('address'),
            "gender" => $request->input('gender'),
            "image" => $file
        ]);
    }
}
