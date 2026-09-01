<?php

namespace App\Http\Controllers;

use App\Models\Tagihan;
use Illuminate\Http\Request;

class TagihanController extends Controller
{
    // Menampilkan daftar tagihan iuran
    public function index()
    {
        $tagihan = Tagihan::with('peserta.user')->get();
        return view('tagihan.index', compact('tagihan'));
    }

    // Form buat tagihan baru
    public function create()
    {
        $peserta = \App\Models\PesertaBpjs::with('user')->get();
        return view('tagihan.create', compact('peserta'));
    }

    // Simpan tagihan baru
    public function store(Request $request)
    {
        $request->validate([
            'peserta_id' => 'required',
            'bulan_tahun' => 'required',
            'nominal' => 'required|numeric',
        ]);

        Tagihan::create([
            'peserta_id' => $request->peserta_id,
            'bulan_tahun' => $request->bulan_tahun,
            'nominal' => $request->nominal,
            'status_pembayaran' => 'Belum Lunas'
        ]);

        return redirect()->route('tagihan.index')->with('success', 'Tagihan berhasil dibuat!');
    }
}