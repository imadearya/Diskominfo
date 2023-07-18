<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pemkot>
 */
class PemkotFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
           'user_id'=>mt_rand(1,5),
           'kecamatan_id'=>mt_rand(1,5),
           'NIK'=>$this->faker->nik(),
           'Nama'=>$this->faker->name(),
           'Alamat'=>$this->faker->streetAddress(),
        ];
    }
}
