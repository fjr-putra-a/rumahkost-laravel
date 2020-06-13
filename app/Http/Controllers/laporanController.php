<?php

namespace App\Http\Controllers;

use App\Model\View\V_Penyewa;
use Illuminate\Http\Request;

class laporanController extends Controller
{
    public function penyewa()
    {
        $penyewa = V_Penyewa::all();
        return view('laporan.penyewa', compact('penyewa'));
    }
}
