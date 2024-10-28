<?php

namespace App\Http\Controllers;

use App\Models\Umkm;
use App\Models\JenisUsaha;
use Illuminate\Http\Request;

class UmkmController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $umkms = Umkm::with('jenisUsaha')->get(); // Get all UMKM records with their related JenisUsaha
        return view('umkm.index', compact('umkms'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $jenisUsahas = JenisUsaha::all(); // Get all JenisUsaha for dropdown
        return view('umkm.create', compact('jenisUsahas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_usaha' => 'required|string',
            'pemilik' => 'required|string',
            'jalan' => 'required|string',
            'desa' => 'required|string',
            'kecamatan' => 'required|string',
            'jenis_usaha_id' => 'required|exists:jenis_usahas,id',
        ]);

        Umkm::create($request->all());

        return redirect()->route('umkm.index')->with('success', 'UMKM berhasil ditambahkan.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Umkm $umkm)
    {
        $jenisUsahas = JenisUsaha::all(); // Get all JenisUsaha for dropdown
        return view('umkm.edit', compact('umkm', 'jenisUsahas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Umkm $umkm)
    {
        $request->validate([
            'nama_usaha' => 'required|string',
            'pemilik' => 'required|string',
            'jalan' => 'required|string',
            'desa' => 'required|string',
            'kecamatan' => 'required|string',
            'jenis_usaha_id' => 'required|exists:jenis_usahas,id',
        ]);

        $umkm->update($request->all());

        return redirect()->route('umkm.index')->with('success', 'UMKM berhasil diupdate.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Umkm $umkm)
    {
        $umkm->delete();

        return redirect()->route('umkm.index')->with('success', 'UMKM berhasil dihapus.');
    }
}
