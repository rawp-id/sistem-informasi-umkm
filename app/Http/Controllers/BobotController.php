<?php

namespace App\Http\Controllers;

use App\Models\Bobot;
use Illuminate\Http\Request;

class BobotController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bobots = Bobot::all();
        return view('bobot.index', compact('bobots'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('bobot.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'kode' => 'required|string',
            'nama' => 'required|string',
            'nilai_kriteria' => 'required|string',
            'tipe' => 'required|in:benefit,cost',
        ]);

        Bobot::create($request->all());

        return redirect()->route('bobot.index')->with('success', 'Bobot created successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Bobot $bobot)
    {
        return view('bobot.edit', compact('bobot'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Bobot $bobot)
    {
        $request->validate([
            'kode' => 'required|string',
            'nama' => 'required|string',
            'nilai_kriteria' => 'required|string',
            'tipe' => 'required|in:benefit,cost',
        ]);

        $bobot->update($request->all());

        return redirect()->route('bobot.index')->with('success', 'Bobot updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Bobot $bobot)
    {
        $bobot->delete();
        return redirect()->route('bobot.index')->with('success', 'Bobot deleted successfully.');
    }
}
