<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('jadwal_lapangans', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal_sedia');
            $table->string('time_slot');
            $table->enum('status', ['Ada','Kosong']);
            $table->foreignId('lapangan_id')->constrained('lapangans')->nullable;
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jadwal_lapangans');
    }
};
