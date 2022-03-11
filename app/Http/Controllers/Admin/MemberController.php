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
        $this->validate($request, [
            'member_code' => 'required|string',
            'name' => 'required|string',
            'address' => 'required|string',
            'gender' => 'required|string',
            'image' => 'required',
        ]);
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
        return redirect()->route('index-member');
    }

    public function tampilan()
    {
        $members = Member::all();
        return view('master.admin.anggota.table', compact('members'));
    }
}
