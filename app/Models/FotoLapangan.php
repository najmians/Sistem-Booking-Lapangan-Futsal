<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FotoLapangan extends Model
{
    public function lapangan()
    {
        return $this->belongsTo(Lapangan::class);
    }
}
