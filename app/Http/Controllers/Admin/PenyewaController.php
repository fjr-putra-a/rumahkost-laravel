<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Kamar;
use App\Model\Penyewa;
use App\Model\View\V_kamar;
use App\Model\View\V_Penyewa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class PenyewaController extends Controller
{
    protected $path = 'img/profile';

    public function index()
    {
        $penyewa = V_Penyewa::all();
        $kamar = V_kamar::all();
        return view('_sysadmin.penyewa', compact('penyewa', 'kamar'));
    }
    public function profil($id)
    {
        $penyewa = V_Penyewa::where('id', $id)->first();
        return view('_sysadmin.profil-penyewa', compact('penyewa'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'email' => 'required',
            'nomor_ktp' => 'required',
            'jk' => 'required',
            'pekerjaan' => 'required',
            'no_hp' => 'required',
            'id_kamar' => 'required',
            'tanggal_masuk' => 'required',
            'foto' => 'file|image|mimes:jpeg,png,jpg|max:1000'
        ]);

        $file = $request->file('foto');
        $foto = 'profile-' . time() . '.' . $file->getClientOriginalExtension();
        $file->move($this->path, $foto);

        Kamar::where('id', $request->id_kamar)->update(['status_kamar' => 'Terisi']);

        Penyewa::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'nomor_ktp' => $request->nomor_ktp,
            'jk' => $request->jk,
            'pekerjaan' => $request->pekerjaan,
            'no_hp' => $request->no_hp,
            'id_kamar' => $request->id_kamar,
            'tanggal_masuk' => $request->tanggal_masuk,
            'tanggal_keluar' => $request->tanggal_keluar,
            'foto' => $foto
        ]);

        return redirect()->back()->with('alert', 'Data penyewa berhasil ditambahkan!');
    }
    public function update(Request $request, Penyewa $penyewa)
    {
        $request->validate([
            'email' => 'required',
            'pekerjaan' => 'required',
            'no_hp' => 'required',
            'foto' => 'file|image|mimes:jpg,jpeg,png|max:1000'
        ]);

        if ($request->foto == null) {
            $foto = $penyewa->foto;
        } else {
            if ($penyewa->foto != 'a-penyewa.png') {
                File::delete($this->path . '/' . $penyewa->foto);
            }
            $file = $request->file('foto');
            $foto = 'profile-' . time() . '.' . $file->getClientOriginalExtension();
            $file->move($this->path, $foto);
        }

        Penyewa::where('id', $penyewa->id)->update([
            'email' => $request->email,
            'pekerjaan' => $request->pekerjaan,
            'no_hp' => $request->no_hp,
            'foto' => $foto
        ]);
        return redirect()->back()->with('alert', 'Data penyewa berhasil diubah!');
    }
    public function destroy(Penyewa $penyewa)
    {
        $kamar = Penyewa::where('id', $penyewa->id)->first();

        Kamar::where('id', $kamar->kode_kamar)->update(['status_kamar' => 'Kosong']);

        if ($penyewa->foto != 'a-penyewa.png') {
            File::delete($this->path . '/' . $penyewa->foto);
        }

        Penyewa::destroy('id', $penyewa->id);
        return redirect()->back()->with('alert', 'Data penyewa berhasil dihapus!');
    }
}
