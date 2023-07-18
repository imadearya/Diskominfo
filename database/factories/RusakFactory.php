<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Rusak>
 */
class RusakFactory extends Factory
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
            'nama'=>$this->faker->randomElement(["Rumah Terendam", "Kantor Rusak", "Jembatan Rusak", "Sarana Publik Rusak", "Rumah Rusak Ringan","Rumah Rusak Berat"]),
            'total'=>mt_rand(1,30),
        ];
    }
}
