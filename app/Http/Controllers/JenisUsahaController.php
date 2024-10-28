<?php

namespace App\Http\Controllers;

use App\Models\JenisUsaha;
use Illuminate\Http\Request;

class JenisUsahaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jenisUsaha = JenisUsaha::all();
        return view('jenis_usaha.index', compact('jenisUsaha'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('jenis_usaha.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
        ]);

        JenisUsaha::create([
            'nama' => $request->nama,
        ]);

        return redirect()->route('jenis-usaha.index')->with('success', 'Jenis Usaha berhasil ditambahkan.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(JenisUsaha $jenisUsaha)
    {
        return view('jenis_usaha.edit', compact('jenisUsaha'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, JenisUsaha $jenisUsaha)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
        ]);

        $jenisUsaha->update([
            'nama' => $request->nama,
        ]);

        return redirect()->route('jenis-usaha.index')->with('success', 'Jenis Usaha berhasil diupdate.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(JenisUsaha $jenisUsaha)
    {
        $jenisUsaha->delete();
        return redirect()->route('jenis-usaha.index')->with('success', 'Jenis Usaha berhasil dihapus.');
    }
}
