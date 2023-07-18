<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Sembako>
 */
class SembakoFactory extends Factory
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
            'Nama'=>$this->faker->randomElement(['Beras','Minyak','Gula','Telur','Susu']),
            'Jumlah'=>mt_rand(1,30),
        ];
    }
}
