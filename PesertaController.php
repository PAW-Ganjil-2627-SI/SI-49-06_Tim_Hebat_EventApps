<?php

namespace App\Http\Controllers;

use App\Models\Peserta;
use Illuminate\Http\Request;

class PesertaController extends Controller
{
    public function index()
    {
        $peserta = Peserta::latest()->get();

        return view('peserta.index', compact('peserta'));
    }

    public function create()
    {
        return view('peserta.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_lengkap' => 'required',
            'instansi'     => 'required',
            'nomor_kontak' => 'required',
            'email'        => 'required|email',
        ]);

        Peserta::create($request->all());

        return redirect()->route('peserta.index')
            ->with('success', 'Data peserta berhasil ditambahkan.');
    }

    public function edit(Peserta $peserta)
    {
        return view('peserta.edit', compact('peserta'));
    }

    public function update(Request $request, Peserta $peserta)
    {
        $request->validate([
            'nama_lengkap' => 'required',
            'instansi'     => 'required',
            'nomor_kontak' => 'required',
            'email'        => 'required|email',
        ]);

        $peserta->update($request->all());

        return redirect()->route('peserta.index')
            ->with('success', 'Data peserta berhasil diubah.');
    }

    public function destroy(Peserta $peserta)
    {
        $peserta->delete();

        return redirect()->route('peserta.index')
            ->with('success', 'Data peserta berhasil dihapus.');
    }
}