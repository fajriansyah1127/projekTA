<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Asuransi>
 */
class AsuransiFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'nama' =>  $this->faker->company(),
            'email' => $this->faker->email(),
            'kontak' => $this->faker->phoneNumber(),
            'alamat' => $this->faker->address(),
            'status' => 'Berlaku',
        ];
    }
}
