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

        // PACKAGES
        DB::table('packages')->insert([
            [
                'title' => 'Photobox (Everyday)',
                'price' => '30k',
                'old_price' => '50k',
                'features' => json_encode([
                    '10 Minutes Photoshoot',
                    '5 Minutes Photo Selection',
                    'Free All Soft Files',
                    'Free 1 Printed Photo per Session',
                ]),
                'category' => 'Photobox',
                'is_active' => true,
            ],

            [
                'title' => 'Potrait Self-Photo Studio (Weekdays)',
                'price' => '55k',
                'old_price' => '75k',
                'features' => json_encode([
                    '15 Minutes Photoshoot',
                    '5 Minutes Photo Selection',
                    'Free All Soft Files',
                ]),
                'category' => 'Photo Studio',
                'is_active' => true,
            ],

            [
                'title' => 'Potrait Self-Photo Studio (Weekends)',
                'price' => '75k',
                'old_price' => '100k',
                'features' => json_encode([
                    '15 Minutes Photoshoot',
                    '5 Minutes Photo Selection',
                    'Free All Soft Files',
                ]),
                'category' => 'Photo Studio',
                'is_active' => true,
            ],

            [
                'title' => 'Landscape Self-Photo Studio (Everyday)',
                'price' => '155k',
                'old_price' => '175k',
                'features' => json_encode([
                    '25 Minutes Photoshoot',
                    '5 Minutes Photo Selection',
                    'Free All Soft Files',
                ]),
                'category' => 'Photo Studio',
                'is_active' => true,
            ],

            [
                'title' => 'High Fisheye Photobox (Everyday)',
                'price' => '40k',
                'old_price' => '60k',
                'features' => json_encode([
                    '10 Minutes Photoshoot',
                    '5 Minutes Photo Selection',
                    'Free All Soft Files',
                    'Free 1 Printed Photo per Session',
                ]),
                'category' => 'Photobox',
                'is_active' => true,
            ],
        ]);

        for ($i = 1; $i <= 100; $i++) {
            DB::table('orders')->insert([
                'label_id' => rand(1, 3),
                'user_id' => 1,
                'background_id' => rand(1, 12),
                'studio_id' => rand(1, 11),
                'pembayaran_id' => rand(1, 3),
                'waktu_id' => rand(1, 36),
                'kota_id' => rand(1, 8),
                'tanggal' => fake()->dateTimeBetween('2026-01-01', '2026-06-30')->format('Y-m-d'),
                'jumlah_orang' => rand(1, 8),
                'nomor_telepon' => '08' . rand(111111111, 999999999),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

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
