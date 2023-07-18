<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pengungsi>
 */
class PengungsiFactory extends Factory
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
            'NIK'=>$this->faker->nik(),
            'nama'=>$this->faker->name(),
            'umur'=>mt_rand(10,60),
            'alamat'=>$this->faker->streetAddress(),
        ];
    }
}
