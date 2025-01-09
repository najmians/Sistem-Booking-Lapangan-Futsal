<?php

namespace App\Http\Controllers;

use App\Models\Lapangan;
use App\Models\JadwalLapangan;
use Illuminate\Http\Request;

class JadwalLapanganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jadwal_lapangans = JadwalLapangan::with("lapangan")->paginate(10);
        return view('jadwal_lapangan.index', compact('jadwal_lapangans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $lapangans = Lapangan::pluck('nama', 'id');
        return view('jadwal_lapangan.create', compact('lapangans'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $jadwal_lapangans = new JadwalLapangan();
        $jadwal_lapangans->lapangan_id = $request->lapangan_id;
        $jadwal_lapangans->tanggal_sedia = $request->tanggal_sedia;
        $jadwal_lapangans->slot_waktu = $request->slot_waktu;
        $jadwal_lapangans->status = $request->status;
        $jadwal_lapangans->save();
        return redirect()->route('jadwal_lapangan.index');
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
        $jadwal_lapangan = JadwalLapangan::find($id);
        $lapangans = Lapangan::pluck('nama', 'id');
        return view('jadwal_lapangan.edit', compact('jadwal_lapangan', 'lapangans'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $jadwal_lapangans = JadwalLapangan::find($id);
        $jadwal_lapangans->lapangan_id = $request->lapangan_id;
        $jadwal_lapangans->tanggal_sedia = $request->tanggal_sedia;
        $jadwal_lapangans->slot_waktu = $request->slot_waktu;
        $jadwal_lapangans->status = $request->status;
        $jadwal_lapangans->save();
        return redirect()->route('jadwal_lapangan.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $jadwal_lapangans = JadwalLapangan::findOrFail($id);
        $jadwal_lapangans->delete();

        return redirect()->route('jadwal_lapangan.index');
    }
}
