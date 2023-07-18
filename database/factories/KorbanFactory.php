<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Korban>
 */
class KorbanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'bencana_id'=>$this->faker->randomElement(['BJR-001','BJR-002', 'BJR-003', 'BJR-004', 'BJR-005']),
            'NIK'=>$this->faker->nik(),
            'nama'=>$this->faker->name(),
            'umur'=>mt_rand(10,60),
            'status'=>$this->faker->randomElement(['Meninggal','Hilang', 'Mengungsi', 'Terluka']),
        ];
    }
}
