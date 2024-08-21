<?php

namespace Database\Seeders;

use App\Models\TabKinerja;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TabKinerjaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        TabKinerja::factory()->count(10)->create();

        // tab_kinerja::create([
        //     'nama_kegiatan'=>'KSA',
        //     'tim_kerja_id'=>1,
        //     'user_id'=>1,
        //     'periode_kegiatan'=>'1 Januari 2024 - 24 Januari 2024',
        //     'target'=>65,
        //     'realisasi'=>65,
        //     'satuan'=>'sampel',
        //     'link_bukti_dukung'=>'link',
        //     'keterangan'=>'sudah selesai semua',
        // ]);

        // tab_kinerja::create([
        //     'nama_kegiatan'=>'Ubinan',
        //     'tim_kerja_id'=>2,
        //     'user_id'=>1,
        //     'periode_kegiatan'=>'15 Februari 2024 - 2 Maret 2024',
        //     'target'=>56,
        //     'realisasi'=>43,
        //     'satuan'=>'titik sampel',
        //     'link_bukti_dukung'=>'link',
        //     'keterangan'=>'beberapa susah dijangkau',
        // ]);

        // tab_kinerja::create([
        //     'nama_kegiatan'=>'Sakernas',
        //     'tim_kerja_id'=>2,
        //     'user_id'=>1,
        //     'periode_kegiatan'=>'18 Juli 2024 - 30 Juli 2024',
        //     'target'=>1008,
        //     'realisasi'=>1008,
        //     'satuan'=>'sampel',
        //     'link_bukti_dukung'=>'link',
        //     'keterangan'=>'sudah selesai semua',
        // ]);
    }
}
