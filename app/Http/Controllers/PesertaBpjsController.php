<?php

namespace App\Http\Controllers;

use App\Models\PesertaBpjs;
use App\Models\User;
use Illuminate\Http\Request;

class PesertaBpjsController extends Controller
{
    // Menampilkan daftar peserta
    public function index()
    {
        $peserta = PesertaBpjs::with('user')->get();
        return view('peserta.index', compact('peserta'));
    }

    // Form tambah peserta
    public function create()
    {
        $users = User::all();
        return view('peserta.create', compact('users'));
    }

    // Menyimpan data peserta baru
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required',
            'nomor_bpjs' => 'required|unique:peserta_bpjs',
            'nik' => 'required|unique:peserta_bpjs',
            'kelas_bpjs' => 'required',
        ]);

        PesertaBpjs::create($request->all());

        return redirect()->route('peserta.index')->with('success', 'Data peserta berhasil ditambahkan!');
    }
}