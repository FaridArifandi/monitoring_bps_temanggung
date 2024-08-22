<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\TimKerja;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

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
        // Menghasilkan dua tanggal acak untuk range date
        $startDate = $this->faker->dateTimeBetween('-1 years', 'now');
        $endDate = $this->faker->dateTimeBetween($startDate, '+1 years');

        return [
            'nama_kegiatan' => $this->faker->word,
            'tim_kerja_id' => TimKerja::factory()->count($this->faker->numberBetween(1, 4)), // Pilih secara acak di antara 3-4 tim kerja yang sudah dibuat
            'user_id' => User::factory(), // Menggunakan factory untuk user
            'start_date' => Carbon::parse($startDate)->format('Y-m-d'),
            'end_date' => Carbon::parse($endDate)->format('Y-m-d'),
            'target' => $this->faker->numberBetween(50, 1000),
            'realisasi' => $this->faker->numberBetween(50, 1000),
            'satuan' => $this->faker->randomElement(['sampel', 'titik sampel', 'unit']),
            'link_bukti_dukung' => $this->faker->url,
            'keterangan' => $this->faker->sentence,
        ];
    }
}
