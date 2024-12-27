<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Lapangan;
use App\Models\Pelanggan;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bookings = Booking::with("lapangan","pelanggan")->paginate(3);
        return view('booking.index', compact('bookings'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $lapangans = Lapangan::pluck('nama', 'id');
        $pelanggans = Pelanggan::pluck('nama', 'id');
        return view('booking.create', compact('lapangans', 'pelanggans'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $bookings = new Booking();
        $bookings->pelanggan_id = $request->pelanggan_id;
        $bookings->lapangan_id = $request->lapangan_id;
        $bookings->tgl_booking = $request->tgl_booking;
        $bookings->waktu_mulai = $request->waktu_mulai;
        $bookings->waktu_selesai = $request->waktu_selesai;
        $bookings->total_harga = $request->total_harga;
        $bookings->status = $request->status;
        $bookings->save();
        return redirect()->route('booking.index');
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
        $booking = Booking::find($id);
        $lapangans = Lapangan::pluck('nama', 'id');
        $pelanggans = Lapangan::pluck('nama', 'id');
        return view('booking.edit', compact('booking', 'lapangans', 'pelanggans'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $bookings = Booking::find($id);
        $bookings->pelanggan_id = $request->pelanggan_id;
        $bookings->lapangan_id = $request->lapangan_id;
        $bookings->waktu_mulai = $request->waktu_mulai;
        $bookings->waktu_selesai = $request->waktu_selesai;
        $bookings->total_harga = $request->total_harga;
        $bookings->status = $request->status;
        $bookings->save();
        return redirect()->route('booking.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $bookings = Booking::findOrFail($id);
        $bookings->delete();

        return redirect()->route('booking.index');
    }
}
