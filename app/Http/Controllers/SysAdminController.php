<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SysAdminController extends Controller
{
    public function beranda()
    {
        return view('_sysadmin.beranda-admin');
    }
}
