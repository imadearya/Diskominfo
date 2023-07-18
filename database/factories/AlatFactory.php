<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Alat>
 */
class AlatFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'penampungan_id'=>mt_rand(1,5),
            'nama'=>$this->faker->randomElement(['Tenda', 'Obat', 'Pakaian', 'Ambulance', 'Mobil', 'Senter']),
            'kategori'=>$this->faker->randomElement(['Transportasi', 'Komunikasi dan Informasi', 'Penerangan', 'Pencarian Evakuasi']),
            'jumlah'=>mt_rand(1,20),
        ];
    }
}
