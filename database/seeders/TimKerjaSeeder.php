<?php

namespace Database\Seeders;

use App\Models\TimKerja;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TimKerjaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        TimKerja::factory()->count(5)->create();

        // tim_kerja::create([
        //     'nama_tim' => 'Tim Alpha',
        //     'nama_ketua' => 'Andri',
        // ]);

        // tim_kerja::create([
        //     'nama_tim' => 'Tim Beta',
        //     'nama_ketua' => 'Budi',
        // ]);
    }


}
