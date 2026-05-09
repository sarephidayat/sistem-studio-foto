<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MasterDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // MASTER LABEL
        DB::table('master_label')->insert([
            ['nama' => 'first customer'],
            ['nama' => 'return customer'],
        ]);

        // MASTER BACKGROUND
        DB::table('master_background')->insert([
            ['nama' => 'gray'],
            ['nama' => 'white'],
            ['nama' => '90s Year Book'],
            ['nama' => 'Beige'],
            ['nama' => '80s Year Book'],
            ['nama' => '90s Year Book'],
            ['nama' => 'Aquarium'],
            ['nama' => 'Baby Blue'],
            ['nama' => 'Baby Pink'],
            ['nama' => 'Backgorund KUA'],
            ['nama' => 'Black'],
            ['nama' => 'Black Piramid Sound Diffuser'],
        ]);

        // MASTER STUDIO
        DB::table('master_studio')->insert([
            ['nama' => 'Kuy Studio 1.0 Oro Oro Dowo'],
            ['nama' => 'Kuy Studio 2.0 Suhat'],
            ['nama' => 'Kuy Studio 3.0 Klampis'],
            ['nama' => 'Kuy Studio 4.0 Kilisuci'],
            ['nama' => 'Kuy Studio 5.0 Jagakarsa'],
            ['nama' => 'Kuy Studio 6.0 Badung'],
            ['nama' => 'Kuy Studio 7.0 Affandi'],
            ['nama' => 'Kuy Studio 8.0 Jember'],
            ['nama' => 'Kuy Studio 9.0 Banyumanik'],
            ['nama' => 'Kuy Studio 10.0 Labuan'],
            ['nama' => 'Kuy Studio 11.0 Karangasem'],
        ]);

        // MASTER PEMBAYARAN
        DB::table('master_pembayaran')->insert([
            ['nama' => 'Bank Rakyat Indonesia'],
            ['nama' => 'Bank Negaraa Indonesia'],
            ['nama' => 'QRIS'],
        ]);

        // MASTER KOTA
        DB::table('master_kota')->insert([
            ['nama' => 'Kota Jakarta Selatan'],
            ['nama' => 'Kota Semarang'],
            ['nama' => 'Kabupaten Sleman'],
            ['nama' => 'Kabupaten Jember'],
            ['nama' => 'Kota Kediri'],
            ['nama' => 'Kota Malang'],
            ['nama' => 'Kota Surabaya'],
            ['nama' => 'Kabupaten Bandung'],
        ]);

        // MASTER WAKTU (contoh slot 20 menit)
        $times = [];
        $start = strtotime('09:00');
        $end = strtotime('21:00');

        while ($start < $end) {
            $times[] = [
                'waktu' => date('H:i:s', $start),
                'created_at' => now(),
                'updated_at' => now(),
            ];

            $start = strtotime('+20 minutes', $start);
        }

        DB::table('master_waktu')->insert($times);
    }
}
