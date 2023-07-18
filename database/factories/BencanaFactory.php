<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class BencanaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        static $counter = 1; // Inisialisasi counter

        $formattedCounter = str_pad($counter, 3, '0', STR_PAD_LEFT); // Mengisi angka dengan nol di depan jika kurang dari 3 digit
        $bencanaId = "BJR-$formattedCounter";
        $counter++;

        return [
            'bencana_id' => $bencanaId,
            'kecamatan_id' => mt_rand(1, 5),
            'nama' => $this->faker->randomElement(['Banjir', 'Puting Beliung', 'Gempa', 'Tanah Longsor', 'Kebakaran']),
            'tanggal' => $this->faker->dateTimeBetween('-7 months'),
            'status' => $this->faker->randomElement(['Belum Ditangani', 'Sedang Ditangani', 'Sudah Ditangani']),
            'deskripsi' => $this->faker->sentence(7),
        ];
    }
}