<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\TimKerja;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\TabKinerja>
 */
class TabKinerjaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nama_kegiatan' => $this->faker->word,
            'tim_kerja_id' => TimKerja::factory(), // Menggunakan factory untuk tim_kerja
            'user_id' => User::factory(), // Menggunakan factory untuk user
            'periode_kegiatan' => $this->faker->date('d F Y') . ' - ' . $this->faker->date('d F Y'),
            'target' => $this->faker->numberBetween(50, 1000),
            'realisasi' => $this->faker->numberBetween(50, 1000),
            'satuan' => $this->faker->randomElement(['sampel', 'titik sampel', 'unit']),
            'link_bukti_dukung' => $this->faker->url,
            'keterangan' => $this->faker->sentence,
        ];
    }
}
