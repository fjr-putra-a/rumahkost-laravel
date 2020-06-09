<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Fasilitas;
use App\Model\Kamar;
use App\Model\View\V_kamar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KamarController extends Controller
{
    public function index()
    {
        $kamar = V_Kamar::all();
        $fasilitas = Fasilitas::all();
        return view('_sysadmin.kamar', compact('kamar', 'fasilitas'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'id_fasilitas' => 'required',
            'tarif' => 'required',
        ]);

        $query_kamar = DB::table("kamar")->orderBy('kode_kamar', 'desc')->first();

        if ($query_kamar) {
            $query = $query_kamar->kode_kamar;
            $kode = ++$query;
        } else {
            $kode = 'K001';
        }

        kamar::create([
            'kode_kamar' => $kode,
            'id_fasilitas' => $request->id_fasilitas,
            'tarif' => $request->tarif,
            'status_kamar' => 'Kosong'
        ]);

        return redirect()->back()->with('alert', 'Data kamar berhasil ditambahkan!');
    }
    public function update(Request $request, Kamar $kamar)
    {
        $request->validate([
            'tarif' => 'required',
        ]);

        Kamar::where('id', $kamar->id)->update([
            'id_fasilitas' => $request->id_fasilitas,
            'tarif' => $request->tarif
        ]);

        return redirect()->back()->with('alert', 'Data kamar berhasil diubah!');
    }
    public function destroy(Kamar $kamar)
    {
        Kamar::destroy('id', $kamar->id);
        return redirect()->back()->with('alert', 'Data kamar berhasil dihapus!');
    }
}
