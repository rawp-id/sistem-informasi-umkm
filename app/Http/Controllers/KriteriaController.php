<?php

namespace App\Http\Controllers;

use App\Models\Kriteria;
use App\Models\Bobot;
use Illuminate\Http\Request;

class KriteriaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kriterias = Kriteria::with('bobot')->get(); // Fetch criteria along with related bobot
        return view('kriteria.index', compact('kriterias'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $bobots = Bobot::all(); // Get all bobot options for the dropdown
        return view('kriteria.create', compact('bobots'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'bobot_id' => 'required|exists:bobots,id',
            'nama_bobot' => 'required|string',
            'nilai_bobot' => 'required|integer',
        ]);

        Kriteria::create($request->all());

        return redirect()->route('kriteria.index')->with('success', 'Kriteria created successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Kriteria $kriteria)
    {
        $bobots = Bobot::all();
        return view('kriteria.edit', compact('kriteria', 'bobots'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Kriteria $kriteria)
    {
        $request->validate([
            'bobot_id' => 'required|exists:bobots,id',
            'nama_bobot' => 'required|string',
            'nilai_bobot' => 'required|integer',
        ]);

        $kriteria->update($request->all());

        return redirect()->route('kriteria.index')->with('success', 'Kriteria updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kriteria $kriteria)
    {
        $kriteria->delete();
        return redirect()->route('kriteria.index')->with('success', 'Kriteria deleted successfully.');
    }
}
