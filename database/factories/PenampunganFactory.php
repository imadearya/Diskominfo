<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Penampungan>
 */
class PenampunganFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'kecamatan_id'=>mt_rand(1,5),
            'nama'=>$this->faker->randomElement(['Pos 1','Pos 2','Pos 3','Pos 4','Pos 5']),
            'alamat'=>$this->faker->streetAddress(),
            'kapasitas'=>$this->faker->randomElement(['50','100','75','60']),
        ];
    }
}
