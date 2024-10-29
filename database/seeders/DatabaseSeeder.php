<?php

namespace Database\Seeders;

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
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $data_usaha = [
            ['nama' => 'Apotek'],
            ['nama' => 'Bengkel'],
            ['nama' => 'Bengkel Motor'],
            ['nama' => 'Barang Campuran'],
            ['nama' => 'Cellular'],
            ['nama' => 'Jual Kayu Bangunan'],
            ['nama' => 'Penjahitan'],
            ['nama' => 'Perdagangan'],
            ['nama' => 'Toko Meubel'],
        ];

        DB::table('jenis_usahas')->insert($data_usaha);

        $data_umkm = [
            [
                'nama_usaha' => 'Kios Lumintu',
                'pemilik' => 'H. Toha Muhiddin',
                'jalan' => 'JL. Galunggung',
                'desa' => 'Sebani',
                'kecamatan' => 'Gadingrejo',
                'jenis_usaha_id' => 4, // Barang Campuran
            ],
            [
                'nama_usaha' => 'UD. Linggar Jati',
                'pemilik' => 'Muhammad Bahrus Salim',
                'jalan' => 'JL. Gatot Subroto 45',
                'desa' => 'Bukir',
                'kecamatan' => 'Purworejo',
                'jenis_usaha_id' => 6, // Jual Kayu Bangunan
            ],
            [
                'nama_usaha' => 'Nanda Motor',
                'pemilik' => 'Rudi Santoso',
                'jalan' => 'JL. Pattimura',
                'desa' => 'Pohjentrek',
                'kecamatan' => 'Purworejo',
                'jenis_usaha_id' => 2, // Bengkel
            ],
            [
                'nama_usaha' => 'Zayaka Tailor',
                'pemilik' => 'Maritza Salim',
                'jalan' => 'Jl. Mawar 78',
                'desa' => 'Krapyak',
                'kecamatan' => 'Kraton',
                'jenis_usaha_id' => 7, // Penjahitan
            ],
        ];

        DB::table('umkms')->insert($data_umkm);

        $data_bobot = [
            [
                'kode' => 'C1',
                'nama' => 'Jenis Usaha',
                'nilai_kriteria' => 0.2,
                'tipe' => 'benefit',
            ],
            [
                'kode' => 'C2',
                'nama' => 'Jumlah Pekerja',
                'nilai_kriteria' => 0.4,
                'tipe' => 'benefit',
            ],
            [
                'kode' => 'C3',
                'nama' => 'Modal Usaha',
                'nilai_kriteria' => 0.4,
                'tipe' => 'cost',
            ],
        ];

        DB::table('bobots')->insert($data_bobot);

        $data_kriteria = [
            [
                'bobot_id' => 1, // Assuming this is linked to "Jenis Usaha" in `bobots`
                'nama_bobot' => 'Mikro',
                'nilai_bobot' => 30,
            ],
            [
                'bobot_id' => 1,
                'nama_bobot' => 'Makro',
                'nilai_bobot' => 70,
            ],
            [
                'bobot_id' => 2, // Assuming this is linked to "Jumlah Pekerja" in `bobots`
                'nama_bobot' => '<=1',
                'nilai_bobot' => 10,
            ],
            [
                'bobot_id' => 2,
                'nama_bobot' => '1-50',
                'nilai_bobot' => 20,
            ],
            [
                'bobot_id' => 2,
                'nama_bobot' => '51-100',
                'nilai_bobot' => 30,
            ],
            [
                'bobot_id' => 2,
                'nama_bobot' => '>100',
                'nilai_bobot' => 40,
            ],
            [
                'bobot_id' => 3, // Assuming this is linked to "Modal Usaha" in `bobots`
                'nama_bobot' => '<=1000000',
                'nilai_bobot' => 10,
            ],
            [
                'bobot_id' => 3,
                'nama_bobot' => '1000000-2000000',
                'nilai_bobot' => 20,
            ],
            [
                'bobot_id' => 3,
                'nama_bobot' => '2000000-3000000',
                'nilai_bobot' => 30,
            ],
            [
                'bobot_id' => 3,
                'nama_bobot' => '>3000000',
                'nilai_bobot' => 40,
            ],
        ];
    
        DB::table('kriterias')->insert($data_kriteria);
    }
}
