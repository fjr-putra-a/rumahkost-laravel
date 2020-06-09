<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Token;
use Illuminate\Http\Request;

class TokenController extends Controller
{
    public function index()
    {
        $token = Token::all();
        return view('_sysadmin.token', compact('token'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'token_listrik' => 'required',
            'jumlah_biaya' => 'required',
        ]);

        Token::create([
            'token_listrik' => $request->token_listrik,
            'jumlah_biaya' => $request->jumlah_biaya
        ]);

        return redirect()->back()->with('alert', 'Data token berhasil ditambahkan!');
    }
    public function update(Request $request, Token $token)
    {
        $request->validate(['jumlah_biaya' => 'required']);
        Token::where('id', $token->id)->update(['jumlah_biaya' => $request->jumlah_biaya]);
        return redirect()->back()->with('alert', 'Data token berhasil diubah!');
    }
    public function destroy(Token $token)
    {
        Token::destroy('id', $token->id);
        return redirect()->back()->with('alert', 'Data token berhasil dihapus!');
    }
}
