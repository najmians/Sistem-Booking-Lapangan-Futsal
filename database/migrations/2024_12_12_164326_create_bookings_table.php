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
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->date('tgl_booking');
            $table->string('waktu_mulai');
            $table->string('waktu_selesai');
            $table->unsignedBigInteger('total_harga');
            $table->enum('status', ['pending', 'confirmed', 'canceled']);
            $table->foreignId('pelanggan_id')->constrained('pelanggans')->nullable;
            $table->foreignId('lapangan_id')->constrained('lapangans')->nullable;
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
