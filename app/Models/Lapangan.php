<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lapangan extends Model
{
    public function foto_lapangans()
    {
        return $this->hasMany(FotoLapangan::class);
    }
}
