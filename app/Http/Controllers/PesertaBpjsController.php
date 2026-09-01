<?php

namespace App\Http\Controllers;

use App\Models\PesertaBpjs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PesertaBpjsController extends Controller
{
    public function index()
    {
        $peserta = PesertaBpjs::with('user')->get();
        return view('peserta.index', compact('peserta'));
    }

    public function create()
    {
        return view('peserta.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_warga' => 'required|string|max:255',
            'nomor_bpjs' => 'required|unique:peserta_bpjs',
            'nik' => 'required|digits:16|unique:peserta_bpjs',
            'kelas_bpjs' => 'required',
            'alamat' => 'required',
        ]);

        PesertaBpjs::create([
            'user_id' => Auth::id(), 
            'nama_warga' => $request->nama_warga,
            'nomor_bpjs' => $request->nomor_bpjs,
            'nik' => $request->nik,
            'kelas_bpjs' => $request->kelas_bpjs,
            'alamat' => $request->alamat,
        ]);

        return redirect()->route('peserta.index')->with('success', 'Data warga peserta BPJS berhasil disimpan!');
    }

    public function edit($id)
    {
        $peserta = PesertaBpjs::findOrFail($id);
        return view('peserta.edit', compact('peserta'));
    }

    public function update(Request $request, $id)
    {
        $peserta = PesertaBpjs::findOrFail($id);

        $request->validate([
            'nama_warga' => 'required|string|max:255',
            'nomor_bpjs' => 'required|unique:peserta_bpjs,nomor_bpjs,' . $id,
            'nik' => 'required|digits:16|unique:peserta_bpjs,nik,' . $id,
            'kelas_bpjs' => 'required',
            'alamat' => 'required',
        ]);

        $peserta->update([
            'nama_warga' => $request->nama_warga,
            'nomor_bpjs' => $request->nomor_bpjs,
            'nik' => $request->nik,
            'kelas_bpjs' => $request->kelas_bpjs,
            'alamat' => $request->alamat,
        ]);

        return redirect()->route('peserta.index')->with('success', 'Data warga peserta BPJS berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $peserta = PesertaBpjs::findOrFail($id);
        $peserta->delete();

        return redirect()->route('peserta.index')->with('success', 'Data warga peserta BPJS berhasil dihapus!');
    }
}