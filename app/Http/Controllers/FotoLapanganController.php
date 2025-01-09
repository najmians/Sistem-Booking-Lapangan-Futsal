<?php

namespace App\Http\Controllers;

use App\Models\FotoLapangan;
use App\Models\Lapangan;
use Illuminate\Http\Request;

class FotoLapanganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $foto_lapangans = FotoLapangan::with("lapangan")->paginate(10);
        return view('foto_lapangan.index', compact('foto_lapangans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $lapangans = Lapangan::pluck('nama', 'id');
        return view('foto_lapangan.create', compact('lapangans'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'foto' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'lapangan_id' => 'required'
        ]);

        $foto_lapangan = new FotoLapangan();

        if ($request->hasFile('foto')) {
            $imagePath = $request->file('foto')->store('foto_lapangan', 'public');
            $foto_lapangan->foto = $imagePath;
        }

        $foto_lapangan->lapangan_id = $request->lapangan_id;
        $foto_lapangan->save();
        return redirect()->route('foto_lapangan.index');
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
        $foto_lapangan = FotoLapangan::find($id);
        $lapangans = Lapangan::pluck('nama', 'id');
        return view('foto_lapangan.edit', compact('foto_lapangan', 'lapangans'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'foto' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'lapangan_id' => 'required'
        ]);

        $foto_lapangan = FotoLapangan::find($id);

        if ($request->hasFile('foto')) {
            $imagePath = $request->file('foto')->store('foto_lapangan', 'public');
            $foto_lapangan->foto = $imagePath;
        }

        $foto_lapangan->lapangan_id = $request->lapangan_id;
        $foto_lapangan->save();
        return redirect()->route('foto_lapangan.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $foto_lapangan = FotoLapangan::findOrFail($id);
        $foto_lapangan->delete();

        return redirect()->route('foto_lapangan.index');
    }
}
