<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JadwalLapangan extends Model
{
    public function lapangan()
    {
        return $this->belongsTo(Lapangan::class);
    }
}
