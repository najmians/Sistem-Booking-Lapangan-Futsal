<?php

namespace App\Http\Controllers;

use App\Models\Lapangan;
use Illuminate\Http\Request;

class LapanganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $lapangans = \App\Models\Lapangan::paginate(3);
        return view('lapangan.index', compact('lapangans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('lapangan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $lapangan = new Lapangan();
        $lapangan->nama = $request->nama;
        $lapangan->tipe = $request->tipe;
        $lapangan->harga_per_jam = $request->harga_per_jam;
        $lapangan->status = $request->status;
        $lapangan->save();
        return redirect()->route('lapangan.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $lapangan = Lapangan::find($id);
        return view('lapangan.edit', compact('lapangan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $lapangan = Lapangan::find($id);
        $lapangan->nama = $request->nama;
        $lapangan->tipe = $request->tipe;
        $lapangan->harga_per_jam = $request->harga_per_jam;
        $lapangan->status = $request->status;
        $lapangan->save();
        return redirect()->route('lapangan.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $lapangan = Lapangan::findOrFail($id);
        $lapangan->delete();

        return redirect()->route('lapangan.index');
    }
}
