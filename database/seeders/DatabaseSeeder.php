<?php

namespace Database\Seeders;

use App\Models\FotoLapangan;
use App\Models\Lapangan;
use App\Models\Pelanggan;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'name' => 'Admin',
                'email' => 'admin@gmail.com',
                'password' => bcrypt('admin123'),
                'role' => 'admin'
            ],
            [
                'name' => 'Operator',
                'email' => 'operator@gmail.com',
                'password' => bcrypt('operator123'),
                'role' => 'operator'
            ]
        ]);

        //pelanggan
        for ($i = 0; $i < 100; $i++) {
            DB::table('pelanggans')->insert([
                'nama' => fake()->name(),
                'no_telp' => fake()->phoneNumber()
            ]);
        }

        // kategori
        for ($i = 0; $i < 100; $i++) {
            DB::table('kategoris')->insert([
                [
                    'nama_kategori' => fake()->randomElement(['indoor', 'outdoor']),
                    'deskripsi' => fake()->randomElement([
                        'lapangan dalam ruangan',
                        'lapangan luar runangan'
                    ])
                ]
            ]);
        }

        // lapangan
        for ($i = 0; $i < 100; $i++) {
            DB::table('lapangans')->insert([
                'nama' => 'Lapangan Futsal',
                'tipe' => fake()->randomElement(['Rumput Sintetis', 'Vinyl', 'Parquet(Kayu)', 'Semen', 'Aspal']),
                'harga_per_jam' => '100.000',
                'status' => fake()->randomElement(['Aktif', 'Tidak aktif']),
            ]);
        }

        // foto lapangan
        for ($i = 0; $i < 100; $i++) {
            DB::table('foto_lapangans')->insert([
                'foto' => fake()->lexify('?????????????.jpg'),
                'lapangan_id' => fake()->randomElement(Lapangan::pluck('id')->toArray()),
            ]);
        }

        // jadwal lapangan
        for ($i = 0; $i < 100; $i++) {
            DB::table('jadwal_lapangans')->insert([
                'tanggal_sedia' => fake()->date(),
                'slot_waktu' => '01.00',
                'status' => fake()->randomElement(['Ada', 'Kosong']),
                'lapangan_id' => fake()->randomElement(Lapangan::pluck('id')->toArray()),
            ]);
        }

        // booking
        for ($i = 0; $i < 100; $i++) {
            DB::table('bookings')->insert([
                'tgl_booking' => fake()->date(),
                'waktu_mulai' => '01.00',
                'waktu_selesai' => '02.00',
                'total_harga' => '100.000',
                'status' => fake()->randomElement(['pending', 'confirmed', 'canceled']),
                'pelanggan_id' => fake()->randomElement(Pelanggan::pluck('id')->toArray()),
                'lapangan_id' => fake()->randomElement(Lapangan::pluck('id')->toArray()),
            ]);
        }
    }
}
