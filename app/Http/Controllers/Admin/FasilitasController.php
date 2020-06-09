<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Fasilitas;
use Illuminate\Http\Request;

class FasilitasController extends Controller
{
    public function index()
    {
        $fasilitas = Fasilitas::all();
        return view('_sysadmin.fasilitas', compact('fasilitas'));
    }
    public function store(Request $request)
    {
        $request->validate(['nama_fasilitas' => 'required']);
        Fasilitas::create($request->all());
        return redirect()->back()->with('alert', 'Data fasilitas berhasil ditambahkan!');
    }
    public function update(Request $request, Fasilitas $fasilitas)
    {
        $request->validate(['nama_fasilitas' => 'required']);
        Fasilitas::where('id', $fasilitas->id)->update(['nama_fasilitas' => $request->nama_fasilitas]);
        return redirect()->back()->with('alert', 'Data fasilitas berhasil diubah!');
    }
    public function destroy(Fasilitas $fasilitas)
    {
        Fasilitas::destroy('id', $fasilitas->id);
        return redirect()->back()->with('alert', 'Data fasilitas berhasil dihapus!');
    }
}
