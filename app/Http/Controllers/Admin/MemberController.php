<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    public function tambah()
    {
        return view('master.admin.anggota.plus');
    }
}
