<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lapangan extends Model
{
    public function foto_lapangans()
    {
        return $this->hasMany(FotoLapangan::class);
    }
    public function jadwal_lapangans()
    {
        return $this->hasMany(JadwalLapangan::class);
    }
    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
}
