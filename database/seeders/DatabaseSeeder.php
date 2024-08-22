<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\TimKerja;
use App\Models\TabKinerja;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(5)->create();

        // Buat 3-4 tim kerja
        $timKerja = TimKerja::factory()->count(4)->create();

        // Buat 15 kegiatan, didistribusikan ke tim kerja yang sudah dibuat
        $timKerja->each(function ($tim) {
            TabKinerja::factory()->count(rand(3, 6))->create([
                'tim_kerja_id' => $tim->id,
            ]);
        });
        // User::factory()->create([
        //     'name' => 'BPS',
        //     'email' => 'BPS@example.com',
        //     'password' => bcrypt('12345'),
        // ]);
    }
}
