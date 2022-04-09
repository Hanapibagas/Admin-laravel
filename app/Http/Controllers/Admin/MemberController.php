<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
        $member = Member::all();
        return view('master.admin.anggota.table', compact('member'));
    }

    public function edit($id)
    {
        $member = Member::where('id', $id)->first();
        return view('master.admin.anggota.update', compact('member'));
    }

    public function update(Request $request, $id)
    {

        // dd($request->input('gender'));
        $this->validate($request, [
            'member_code' => 'required|string',
            'name' => 'required|string',
            'address' => 'required|string',
            'gender' => 'required|string',
        ]);
        // return response()->json($request);
        $member = Member::where('id', $id)->first();

        if ($request->file('image')) {
            $file = $request->file('image')->store('gambar', 'public');
            if ($member->image && file_exists(storage_path('app/public/' . $member->image))) {
                Storage::delete('public/' . $member->image);
                $file = $request->file('image')->store('gambar', 'public');
            }
        }

        if ($request->file('image') === null) {
            $file = $member->image;
        }

        $member->update([
            "member_code" => $request->input('member_code'),
            "name" => $request->input('name'),
            "address" => $request->input('address'),
            "gender" => $request->input('gender'),
            "image" => $file
        ]);

        return redirect()->route('index-member')->with('status', 'Selamat data anda berhasil di update');
    }

    public function delete($id)
    {
        $member = Member::where('id', $id)->first();
        if ($member->image && file_exists(storage_path('app/public/' . $member->image))) {
            Storage::delete('public/' . $member->image);
        }
        $member->delete();
        return redirect()->route('index-member');
    }
}
