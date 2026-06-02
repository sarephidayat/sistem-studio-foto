<?php

namespace Database\Seeders;

use App\Models\User;
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

        DB::table('master_kota')->insert([

            ['nama' => 'Malang'],
            ['nama' => 'Surabaya'],
            ['nama' => 'Jakarta Selatan'],
            ['nama' => 'Bali'],
            ['nama' => 'Jogja'],
            ['nama' => 'Jember'],
            ['nama' => 'Semarang'],
            ['nama' => 'Surakarta'],

        ]);
        // MASTER STUDIO
        DB::table('master_studio')->insert([

            // MALANG
            [
                'kota_id' => 1,
                'nama' => 'Kuy Studio 1.0 Oro Oro Dowo',
            ],

            [
                'kota_id' => 1,
                'nama' => 'Kuy Studio 2.0 Suhat',
            ],

            // SURABAYA
            [
                'kota_id' => 2,
                'nama' => 'Kuy Studio 3.0 Klampis',
            ],

            // JAKARTA SELATAN
            [
                'kota_id' => 3,
                'nama' => 'Kuy Studio 4.0 Jagakarsa',
            ],

            // BALI
            [
                'kota_id' => 4,
                'nama' => 'Kuy Studio 5.0 Badung',
            ],

            // JOGJA
            [
                'kota_id' => 5,
                'nama' => 'Kuy Studio 6.0 Affandi',
            ],

            // JEMBER
            [
                'kota_id' => 6,
                'nama' => 'Kuy Studio 7.0 Sultan Agung',
            ],

            // SEMARANG
            [
                'kota_id' => 7,
                'nama' => 'Kuy Studio 8.0 Banyumanik',
            ],

            [
                'kota_id' => 7,
                'nama' => 'Kuy Studio 9.0 Labuan',
            ],

            // SURAKARTA
            [
                'kota_id' => 8,
                'nama' => 'Kuy Studio 10.0 Karangasem',
            ],

        ]);

        // MASTER PEMBAYARAN
        DB::table('master_pembayaran')->insert([
            ['nama' => 'Bank Rakyat Indonesia'],
            ['nama' => 'Bank Negaraa Indonesia'],
            ['nama' => 'QRIS'],
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
